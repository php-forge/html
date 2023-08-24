<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

use function array_merge;
use function get_debug_type;
use function implode;
use function in_array;

abstract class AbstractSelect extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasItems;
    use Attribute\Custom\HasLabel;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\Input\CanBeMultiple;
    use Attribute\Input\HasName;
    use Attribute\Input\HasSize;
    use Attribute\Input\HasValue;
    use Attribute\Tag\HasGroup;
    use Attribute\Tag\HasPrompt;

    protected array $attributes = [];

    protected function run(): string
    {
        $attributes = $this->attributes;
        /** @psalm-var array<int, \Stringable|scalar>|scalar|object|null $value */
        $value = $attributes['value'] ?? [];

        $items = match ($this->prompt) {
            '' => PHP_EOL . Tag::widget()->content('Select an option')->tagName('option')->render(),
            default => PHP_EOL . $this->prompt,
        };

        if (is_object($value)) {
            throw new InvalidArgumentException('Select::class widget value can not be an object.');
        }

        if ($this->items !== []) {
            $items .= PHP_EOL . implode(PHP_EOL, $this->renderItems($value)) . PHP_EOL;
        }

        unset($attributes['value']);

        return match ($this->labelContent) {
            '' => Tag::widget()
                ->attributes($attributes)
                ->content($items)
                ->tagName('select')
                ->render(),
            default => HtmlBuilder::create(
                'label',
                $this->labelContent . PHP_EOL .
                Tag::widget()->attributes($attributes)->content($items)->tagName('select')->render() . PHP_EOL,
                $this->labelAttributes
            ),
        };
    }

    /**
     * @psalm-return string[]
     *
     * @psalm-param array<int, \Stringable|scalar>|null|scalar $formValue
     */
    private function renderItems(mixed $formValue): array
    {
        $formValue = match (get_debug_type($formValue)) {
            'array' => $formValue,
            default => [$formValue],
        };
        $items = [];
        $itemsAttributes = $this->itemsAttributes;
        /** @psalm-var string[]|string[][] $values */
        $values = $this->items;

        foreach ($values as $value => $content) {
            if (is_array($content)) {
                /** @psalm-var array $groupAttrs */
                $groupAttrs = $this->groups[$value] ?? [];
                $options = [];

                foreach ($content as $v => $c) {
                    /** @psalm-var array */
                    $itemsAttributes[$v] ??= [];
                    $options[] = Tag::widget()
                        ->attributes(
                            array_merge(
                                $itemsAttributes[$v],
                                ['selected' => in_array($v, $formValue), 'value' => $v],
                            )
                        )
                        ->content($c)
                        ->tagName('option')
                        ->render();
                }

                $items[] = Tag::widget()
                    ->attributes($groupAttrs)
                    ->content(implode(PHP_EOL, $options))
                    ->tagName('optgroup')
                    ->render();
            } else {
                /** @psalm-var array */
                $itemsAttributes[$value] ??= [];
                $items[] = Tag::widget()
                    ->attributes(
                        array_merge(
                            $itemsAttributes[$value],
                            ['selected' => in_array($value, $formValue), 'value' => $value],
                        )
                    )
                    ->content($content)
                    ->tagName('option')
                    ->render();
            }
        }

        return $items;
    }
}
