<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\Attribute\Custom\HasValidateScalar;

/*
 * Generates a list of radio buttons.
 *
 * A radio button is a graphical control element that allows the user to choose only one of a predefined set of mutually
 * exclusive options.
 */
final class RadioList extends Base\AbstractChoiceList
{
    use HasValidateScalar;

    /**
     * Sets the items for the RadioList.
     *
     * @param Radio ...$items An array of Radio objects representing the items for the RadioList.
     *
     * @return self A new instance or clone of the current object with the items set.
     */
    public function items(Radio ...$items): self
    {
        $new = clone $this;
        $new->items = $items;

        return $new;
    }

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
            'id()' => [$this->generateId('radiolist-')],
            'template()' => ['{label}\n{tag}'],
        ];
    }

    protected function run(): string
    {
        $this->validateScalar($this->checked);

        return $this->buildChoiceListTag('radio');
    }
}
