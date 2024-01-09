<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/*
 * Generates a list of radio buttons.
 *
 * A radio button is a graphical control element that allows the user to choose only one of a predefined set of mutually
 * exclusive options.
 */
final class RadioList extends Base\AbstractChoiceList
{
    public function items(Radio ...$items): static
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
            'id()' => [$this->generateId('radiolist-')],
            'template()' => ['{label}\n{tag}'],
        ];
    }

    protected function run(): string
    {
        $this->validateScalar($this->checkedValue);

        return $this->buildChoiceListTag('radio');
    }
}
