<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\CheckedValueInterface;
use PHPForge\Html\Input\Contract\ChoiceInterface;
use PHPForge\Html\Input\Radio;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

abstract class AbstractChoiceList extends Element implements CheckedValueInterface, ChoiceInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasCheckedValue;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasEnclosedByLabel;
    use Attribute\Custom\HasLabel;
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
     * @psalm-var Checkbox[]|Radio[] $items
     */
    protected array $items = [];

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    public function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
            'template()' => ['{label}\n{tag}'],
        ];
    }

    public function items(Checkbox|Radio ...$items): static
    {
        $new = clone $this;
        $new->items = $items;

        return $new;
    }

    protected function run(): string
    {
        $this->validateScalar($this->checkedValue);

        $attributes = $this->attributes;
        $containerAttributes = $this->containerAttributes;
        $id = $this->generateId('choice-');
        $items = $this->items;
        $labelTag = '';
        $listItems = [];

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        if (array_key_exists('autofocus', $attributes) && is_bool($attributes['autofocus'])) {
            $containerAttributes['autofocus'] = $attributes['autofocus'];

            unset($attributes['autofocus']);
        }

        if (array_key_exists('tabindex', $attributes) && is_int($attributes['tabindex'])) {
            $containerAttributes['tabindex'] = $attributes['tabindex'];

            unset($attributes['tabindex']);
        }

        unset($attributes['value']);

        foreach ($items as $item) {
            $listItem = $item
                ->attributes($attributes)
                ->checked($this->checkedValue === $item->getValue())
                ->enclosedByLabel($this->enclosedByLabel)
                ->id(null)
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
                ->id($id)
                ->tagName($this->containerTag)
                ->render(),
            default => $choiceTag,
        };

        return $this->renderTemplate(
            $this->template,
            [
                '{label}' => $this->renderLabelTag($id),
                '{tag}' => $tag,
            ],
        );
    }
}
