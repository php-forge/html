<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement the items attributes methods.
 */
trait HasItemsAttributes
{
    protected array $itemsAttributes = [];

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

    /**
     * Set the `CSS` `HTML` class attribute for the items.
     *
     * @param string $value The `CSS` attribute for the items.
     *
     * @return static A new instance of the current class with the specified class value for the items.
     */
    public function itemsClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->itemsAttributes, $value);

        return $new;
    }
}
