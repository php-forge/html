<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the items methods.
 */
trait HasItems
{
    protected array $items = [];

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
}
