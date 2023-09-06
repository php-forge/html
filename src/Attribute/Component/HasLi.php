<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement li methods.
 */
trait HasLi
{
    protected array $liAttributes = [];

    /**
     * Set the `HTML` attributes for tag `<li>`.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes for tag `<li>`.
     */
    public function liAttributes(array $values): static
    {
        $new = clone $this;
        $new->liAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for tag `<li>`.
     *
     * @param string $value The CSS class name.
     *
     * @return static A new instance of the current class with the specified class for tag `<li>`.
     */
    public function liClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->liAttributes, $value);

        return $new;
    }
}