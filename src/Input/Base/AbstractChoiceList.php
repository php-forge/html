<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Helper\Utils;
use PHPForge\Html\Input\Contract;
use PHPForge\Html\{Attribute, Tag};
use PHPForge\Widget\Element;

abstract class AbstractChoiceList extends Element implements
    Contract\AriaDescribedByInterface,
    Contract\CheckedValueInterface,
    Contract\InputInterface,
    Contract\LabelInterface,
    Contract\RequiredInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasCheckedValue;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasEnclosedByLabel;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasLabelItemClass;
    use Attribute\Custom\HasSeparator;
    use Attribute\Custom\HasTemplate;
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasTabindex;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    /**
     * @psalm-var \PHPForge\Html\Input\Checkbox[]|\PHPForge\Html\Input\Radio[] $items
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

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$this->id-help";
        }

        if (array_key_exists('autofocus', $attributes) && is_bool($attributes['autofocus'])) {
            $containerAttributes['autofocus'] = $attributes['autofocus'];

            unset($attributes['autofocus']);
        }

        if (array_key_exists('tabindex', $attributes) && is_int($attributes['tabindex'])) {
            $containerAttributes['tabindex'] = $attributes['tabindex'];

            unset($attributes['tabindex']);
        }

        if (array_key_exists('name', $attributes) && is_string($attributes['name']) && $type === 'checkbox') {
            $attributes['name'] = Utils::generateArrayableName($attributes['name']);
        }

        unset($attributes['value']);

        foreach ($this->items as $item) {
            $itemValue = $item->getValue();

            $item = match ($type) {
                'checkbox' => $item->checked(in_array($itemValue, (array) $this->checkedValue)),
                'radio' => $item->checked("$itemValue" === "$this->checkedValue"),
            };

            $listItem = $item
                ->attributes($attributes)
                ->enclosedByLabel($this->enclosedByLabel)
                ->labelClass($this->labelItemClass)
                ->separator($this->separator);

            if ($this->enclosedByLabel === true) {
                $listItem = $listItem->enclosedByLabel(true);
            }

            $listItems[] = $listItem;
        }

        $choiceTag = implode(PHP_EOL, $listItems);
        $tag = match ($this->container) {
            true => Tag::widget()
                ->attributes($containerAttributes)
                ->content($choiceTag)
                ->id($this->id)
                ->tagName($this->containerTag)
                ->render(),
            default => $choiceTag,
        };

        return $this->renderTemplate(
            $this->template,
            [
                '{label}' => $this->renderLabelTag($this->id),
                '{tag}' => $tag,
            ],
        );
    }
}
