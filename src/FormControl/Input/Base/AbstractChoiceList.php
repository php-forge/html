<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\{
    Attribute\Aria\HasAriaDescribedBy,
    Attribute\Aria\HasAriaLabel,
    Attribute\CanBeAutofocus,
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasContainer,
    Attribute\Custom\HasEnclosedByLabel,
    Attribute\Custom\HasLabelCollection,
    Attribute\Custom\HasLabelItemClass,
    Attribute\Custom\HasSeparator,
    Attribute\Custom\HasTemplate,
    Attribute\Custom\HasUnchecked,
    Attribute\Custom\HasWidgetValidation,
    Attribute\Field\HasGenerateField,
    Attribute\HasClass,
    Attribute\HasId,
    Attribute\HasTabindex,
    Attribute\Input\CanBeChecked,
    Attribute\Input\CanBeRequired,
    Attribute\Input\HasName,
    FormControl\Input\Contract\AriaDescribedByInterface,
    FormControl\Input\Contract\CheckedInterface,
    FormControl\Input\Contract\InputInterface,
    FormControl\Input\Contract\LabelInterface,
    FormControl\Input\Contract\RequiredInterface,
    Helper\Utils,
    Tag
};
use PHPForge\Widget\Element;

use function in_array;
use function is_bool;
use function is_int;
use function is_scalar;

abstract class AbstractChoiceList extends Element implements
    AriaDescribedByInterface,
    CheckedInterface,
    InputInterface,
    LabelInterface,
    RequiredInterface
{
    use CanBeAutofocus;
    use CanBeChecked;
    use CanBeRequired;
    use HasAriaDescribedBy;
    use HasAriaLabel;
    use HasAttributes;
    use HasClass;
    use HasContainer;
    use HasEnclosedByLabel;
    use HasGenerateField;
    use HasId;
    use HasLabelCollection;
    use HasLabelItemClass;
    use HasName;
    use HasSeparator;
    use HasTabindex;
    use HasTemplate;
    use HasUnchecked;
    use HasWidgetValidation;

    protected array $attributes = [];
    /**
     * @psalm-var \PHPForge\Html\FormControl\Input\Checkbox[]|\PHPForge\Html\FormControl\Input\Radio[] $items
     */
    protected array $items = [];

    /**
     * Generate the HTML representation of CheckboxList or RadioList.
     *
     * @param string $type The type of the list.
     *
     * @return string The HTML representation of the element.
     */
    protected function buildChoiceListTag(string $type): string
    {
        $attributes = $this->attributes;
        $containerAttributes = $this->containerAttributes;
        $listItems = [];
        /** @var string $name */
        $name = $attributes['name'] ?? '';

        if ($this->id === null) {
            unset($attributes['id']);
        }

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$this->id-help";
        }

        if (array_key_exists('autofocus', $attributes) && is_bool($attributes['autofocus'])) {
            $containerAttributes['autofocus'] = $attributes['autofocus'];
        }

        if (array_key_exists('tabindex', $attributes) && is_int($attributes['tabindex'])) {
            $containerAttributes['tabindex'] = $attributes['tabindex'];
        }

        if ($name !== '' && $type === 'checkbox') {
            $name = Utils::generateArrayableName($name);
        }

        unset($attributes['autofocus'], $attributes['tabindex'], $attributes['value']);

        foreach ($this->items as $item) {
            $itemValue = $item->getValue();

            if (is_scalar($this->checked) && $itemValue !== null) {
                $attributes['checked'] = (string) $itemValue === (string) $this->checked;
            }

            if (is_array($this->checked) && $itemValue !== null) {
                $attributes['checked'] = in_array($itemValue, $this->checked);
            }

            $listItem = $item
                ->attributes($attributes)
                ->enclosedByLabel($this->enclosedByLabel)
                ->labelClass($this->labelItemClass)
                ->name($name)
                ->separator($this->separator);

            if ($this->id === null) {
                $listItem = $listItem->id(null);
            }

            if ($this->enclosedByLabel === true) {
                $listItem = $listItem->enclosedByLabel(true);
            }

            $listItems[] = $listItem;
        }

        $choiceTag = implode(PHP_EOL, $listItems);
        $uncheckTag = $this->renderUncheckTag($name);

        if ($uncheckTag !== '') {
            $uncheckTag .= PHP_EOL;
        }

        $tag = match ($this->container) {
            true => Tag::widget()
                ->attributes($containerAttributes)
                ->content($uncheckTag, $choiceTag)
                ->id($this->id)
                ->tagName($this->containerTag)
                ->render(),
            default => $choiceTag,
        };

        $labelFor = $this->labelFor ?? $this->id;

        return $this->renderTemplate(
            $this->template,
            [
                '{label}' => $this->renderLabelTag($labelFor),
                '{tag}' => $tag,
            ],
        );
    }
}
