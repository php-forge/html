<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the items methods.
 */
trait HasItems
{
    protected array $items = [];
    protected array $itemsAttributes = [];

    /**
     * Set the items.
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
     * @param array $value The items.
     *
     * @return static A new instance of the current class with the specified items.
     */
    public function items(array $value = []): static
    {
        $new = clone $this;
        $new->items = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the items.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified items attributes.
     */
    public function itemsAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->itemsAttributes = $values;

        return $new;
    }
}
