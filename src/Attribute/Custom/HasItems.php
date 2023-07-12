<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Provides methods to configure the data items for the widget.
 */
trait HasItems
{
    protected array $items = [];
    protected array $itemsAttributes = [];

    /**
     * Returns a new instances specifying the data items for the widget.
     *
     * The array keys are option values, and the array values are the corresponding option labels. The array can also
     * be nested (for example, some array values are arrays too). For each sub-array, an option group will be generated
     * whose label is the key associated with the sub-array.
     *
     * Example:
     * ```php
     * [
     *     '1' => 'Santiago',
     *     '2' => 'Concepcion',
     *     '3' => 'Chillan',
     *     '4' => 'Moscu'
     *     '5' => 'San Petersburg',
     *     '6' => 'Novosibirsk',
     *     '7' => 'Ekaterinburgo'
     * ];
     * ```
     *
     * Example with options groups:
     * ```php
     * [
     *     '1' => [
     *         '1' => 'Santiago',
     *         '2' => 'Concepcion',
     *         '3' => 'Chillan',
     *     ],
     *     '2' => [
     *         '4' => 'Moscu',
     *         '5' => 'San Petersburg',
     *         '6' => 'Novosibirsk',
     *         '7' => 'Ekaterinburgo'
     *     ],
     * ];
     * ```
     *
     * @param array $value The option data items.
     */
    public function items(array $value = []): static
    {
        $new = clone $this;
        $new->items = $value;

        return $new;
    }

    /**
     * Returns a new instances specifying the `HTML` attributes for items.
     *
     * @param array $values Attribute values indexed by attribute names.
     */
    public function itemsAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->itemsAttributes = $values;

        return $new;
    }
}
