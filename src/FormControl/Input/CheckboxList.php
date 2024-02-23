<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\Attribute\Custom\HasValidateIterable;

/*
 * Generates a list of checkbox buttons.
 *
 * A checkbox is a graphical control element that allows the user to choose one or more options from a predefined set of
 * mutually exclusive options.
 */
final class CheckboxList extends Base\AbstractChoiceList
{
    use HasValidateIterable;

    /**
     * Sets the items for the CheckboxList.
     *
     * @param Checkbox ...$items An array of Checkbox objects representing the items for the CheckboxList.
     *
     * @return self A new instance or clone of the current object with the items set.
     */
    public function items(Checkbox ...$items): self
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
            'id()' => [$this->generateId('checkboxlist-')],
            'template()' => ['{label}\n{tag}'],
        ];
    }

    protected function run(): string
    {
        $this->validateIterable($this->checked);

        return $this->buildChoiceListTag('checkbox');
    }
}
