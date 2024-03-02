<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Base;

use InvalidArgumentException;
use PHPForge\{
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\FormControl\CanBeDisabled,
    Html\Attribute\FormControl\CanBeMultiple,
    Html\Attribute\FormControl\CanBeRequired,
    Html\Attribute\FormControl\HasAutocomplete,
    Html\Attribute\FormControl\HasFieldAttributes,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\FormControl\Label\CanBeDisableLabel,
    Html\Attribute\FormControl\Label\HasLabel,
    Html\Attribute\FormControl\Label\HasLabelAttributes,
    Html\Attribute\FormControl\Label\HasLabelClass,
    Html\Attribute\FormControl\Label\HasLabelFor,
    Html\Attribute\HasClass,
    Html\Attribute\HasId,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\Input\HasSize,
    Html\Attribute\Input\HasValue,
    Html\Attribute\Tag\HasGroup,
    Html\Attribute\Tag\HasItems,
    Html\Attribute\Tag\HasItemsAttributes,
    Html\Attribute\Tag\HasPrompt,
    Html\FormControl\Label,
    Html\Interop\InputInterface,
    Html\Interop\RenderInterface,
    Html\Interop\RequiredInterface,
    Html\Interop\ValueInterface,
    Html\Tag,
    Widget\Element
};
use Stringable;

use function array_merge;
use function get_debug_type;
use function implode;
use function in_array;
use function is_array;
use function is_object;

/**
 * Provides a foundation for creating HTML `select` elements with various attributes and content.
 */
abstract class AbstractSelect extends Element implements
    InputInterface,
    RenderInterface,
    RequiredInterface,
    ValueInterface
{
    use CanBeAutofocus;
    use CanBeDisabled;
    use CanBeDisableLabel;
    use CanBeMultiple;
    use CanBeRequired;
    use HasAriaLabel;
    use HasAttributes;
    use HasAutocomplete;
    use HasClass;
    use HasFieldAttributes;
    use HasGroup;
    use HasId;
    use HasItems;
    use HasItemsAttributes;
    use HasLabel;
    use HasLabelAttributes;
    use HasLabelClass;
    use HasLabelFor;
    use HasName;
    use HasPrefixCollection;
    use HasPrompt;
    use HasSize;
    use HasStyle;
    use HasSuffixCollection;
    use HasTabindex;
    use HasValue;

    protected array $attributes = [];

    protected function run(): string
    {
        /** @psalm-var array<int, Stringable|scalar>|scalar|object|null $value */
        $value = $this->getValue();

        $items = match ($this->prompt) {
            '' => PHP_EOL . Tag::widget()->content('Select an option')->tagName('option')->render(),
            default => PHP_EOL . Tag::widget()
                ->content($this->prompt)
                ->tagName('option')
                ->value($this->promptValue)
                ->render(),
        };

        if (is_object($value)) {
            throw new InvalidArgumentException('Select::class widget value can not be an object.');
        }

        if ($this->isMultiple() === true && is_array($value) === false)
        {
            throw new InvalidArgumentException('Select::class widget value must be an array when multiple is "true".');
        }

        if ($this->items !== []) {
            $items .= PHP_EOL . implode(PHP_EOL, $this->renderItems($value)) . PHP_EOL;
        }

        unset($this->attributes['value']);

        $selectTag = Tag::widget()
            ->attributes($this->attributes)
            ->content($items)
            ->prefix($this->prefix)
            ->prefixContainer($this->prefixContainer)
            ->prefixContainerAttributes($this->prefixContainerAttributes)
            ->prefixContainerTag($this->prefixContainerTag)
            ->suffix($this->suffix)
            ->suffixContainer($this->suffixContainer)
            ->suffixContainerAttributes($this->suffixContainerAttributes)
            ->suffixContainerTag($this->suffixContainerTag)
            ->tagName('select');

        if ($this->disableLabel === true || $this->label === '') {
            return $selectTag->render();
        }

        return Label::widget()
            ->attributes($this->labelAttributes)
            ->content($this->label, PHP_EOL, $selectTag, PHP_EOL)
            ->for($this->labelFor)
            ->render();
    }

    /**
     * @psalm-return string[]
     *
     * @psalm-param array<int, Stringable|scalar>|null|scalar $formValue
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
                    /** @psalm-var array[] $itemsAttributes */
                    $itemsAttributes[$v] ??= [];
                    $options[] = Tag::widget()
                        ->attributes(
                            array_merge(
                                $itemsAttributes[$v],
                                [
                                    'selected' => in_array($v, $formValue),
                                    'value' => $v,
                                ],
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
                /** @psalm-var array[] $itemsAttributes */
                $itemsAttributes[$value] ??= [];
                $items[] = Tag::widget()
                    ->attributes(
                        array_merge(
                            $itemsAttributes[$value],
                            [
                                'selected' => in_array($value, $formValue),
                                'value' => $value,
                            ],
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
