<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Base;

use InvalidArgumentException;
use PHPForge\{
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasLabelCollection,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Field\HasGenerateField,
    Html\Attribute\HasClass,
    Html\Attribute\HasId,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\Input\CanBeDisabled,
    Html\Attribute\Input\CanBeMultiple,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasName,
    Html\Attribute\Input\HasSize,
    Html\Attribute\Input\HasValue,
    Html\Attribute\Tag\HasGroup,
    Html\Attribute\Tag\HasItems,
    Html\Attribute\Tag\HasItemsAttributes,
    Html\Attribute\Tag\HasPrompt,
    Html\FormControl\Label,
    Html\Interop\InputInterface,
    Html\Interop\RequiredInterface,
    Html\Interop\ValueInterface,
    Html\Tag,
    Widget\Element,
    Widget\ElementInterface
};
use Stringable;

use function array_merge;
use function get_debug_type;
use function implode;
use function in_array;
use function is_array;
use function is_bool;
use function is_object;

/**
 * Provides a foundation for creating HTML `select` elements with various attributes and content.
 */
abstract class AbstractSelect extends Element implements
    ElementInterface,
    InputInterface,
    RequiredInterface,
    ValueInterface
{
    use CanBeAutofocus;
    use CanBeDisabled;
    use CanBeMultiple;
    use CanBeRequired;
    use HasAriaLabel;
    use HasAttributes;
    use HasClass;
    use HasGenerateField;
    use HasGroup;
    use HasId;
    use HasItems;
    use HasItemsAttributes;
    use HasLabelCollection;
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
        $attributes = $this->attributes;
        $multiple = false;
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

        if (array_key_exists('multiple', $attributes) && is_bool($attributes['multiple'])) {
            $multiple = $attributes['multiple'];
        }

        if ($multiple === true && is_array($value) === false) {
            throw new InvalidArgumentException('Select::class widget value must be an array when multiple is "true".');
        }

        if ($this->items !== []) {
            $items .= PHP_EOL . implode(PHP_EOL, $this->renderItems($value)) . PHP_EOL;
        }

        unset($attributes['value']);

        $selectTag = Tag::widget()
            ->attributes($attributes)
            ->content($items)
            ->id($this->id)
            ->prefix($this->prefix)
            ->prefixContainer($this->prefixContainer)
            ->prefixContainerAttributes($this->prefixContainerAttributes)
            ->prefixContainerTag($this->prefixContainerTag)
            ->suffix($this->suffix)
            ->suffixContainer($this->suffixContainer)
            ->suffixContainerAttributes($this->suffixContainerAttributes)
            ->suffixContainerTag($this->suffixContainerTag)
            ->tagName('select');

        if ($this->isLabel === false || $this->label === '') {
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
