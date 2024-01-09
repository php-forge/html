<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/*
 * Generates a list of checkboxes buttons.
 *
 * A checkbox is a graphical control element that allows the user to choose one or more options from a predefined set of
 * mutually exclusive options.
 */
final class CheckboxList extends Base\AbstractChoiceList
{
    public function items(Checkbox ...$items): static
    {
        $new = clone $this;
        $new->items = $items;

        return $new;
    }

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    public function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
            'id()' => [$this->generateId('checkboxlist-')],
            'template()' => ['{label}\n{tag}'],
        ];
    }

    protected function run(): string
    {
        $this->validateIterable($this->checkedValue);

        return $this->buildChoiceListTag('checkbox');
    }
}
