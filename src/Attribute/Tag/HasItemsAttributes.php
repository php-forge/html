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
}
