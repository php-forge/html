<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement list item methods.
 */
trait HasListItem
{
    protected array $listItemAttributes = [];
    protected bool $listItemTag = true;

    /**
     * Get the `HTML` attributes for tag `<li>`.
     *
     * @return array Attribute values indexed by attribute names.
     */
    public function getListItemAttributes(): array
    {
        return $this->listItemAttributes;
    }

    /**
     * Set the `HTML` attributes for tag `<li>`.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes for tag `<li>`.
     */
    public function listItemAttributes(array $values): static
    {
        $new = clone $this;
        $new->listItemAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for tag `<li>`.
     *
     * @param string $value The CSS class name.
     *
     * @return static A new instance of the current class with the specified class for tag `<li>`.
     */
    public function listItemClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->listItemAttributes, $value);

        return $new;
    }

    /**
     * Disable or enable the tag `<li>`.
     *
     * @param bool $value Whether to use the tag name or not.
     * Default is `true`. If `false` the tag name not will be used.
     *
     * @return static A new instance of the current class whether to use the tag name `<li>` or not.
     */
    public function listItemTag(bool $value): static
    {
        $new = clone $this;
        $new->listItemTag = $value;

        return $new;
    }
}
