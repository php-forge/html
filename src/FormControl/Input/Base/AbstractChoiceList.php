<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasContainerCollection,
    Html\Attribute\Custom\HasEnclosedByLabel,
    Html\Attribute\Custom\HasLabelCollection,
    Html\Attribute\Custom\HasLabelItemClass,
    Html\Attribute\Custom\HasSeparator,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\Custom\HasUncheckedCollection,
    Html\Attribute\Field\HasGenerateField,
    Html\Attribute\HasClass,
    Html\Attribute\HasId,
    Html\Attribute\HasTabindex,
    Html\Attribute\Input\CanBeChecked,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasName,
    Html\FormControl\Input\Contract\LabelInterface,
    Html\Helper\Utils,
    Html\Interop\AriaDescribedByInterface,
    Html\Interop\CheckedInterface,
    Html\Interop\InputInterface,
    Html\Interop\RequiredInterface,
    Html\Tag,
    Widget\Element,
    Widget\ElementInterface
};

use function in_array;
use function is_bool;
use function is_int;
use function is_scalar;

abstract class AbstractChoiceList extends Element implements
    AriaDescribedByInterface,
    CheckedInterface,
    ElementInterface,
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
    use HasContainerCollection;
    use HasEnclosedByLabel;
    use HasGenerateField;
    use HasId;
    use HasLabelCollection;
    use HasLabelItemClass;
    use HasName;
    use HasSeparator;
    use HasTabindex;
    use HasTemplate;
    use HasUncheckedCollection;

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
