<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;

use function array_merge;

/**
 * Is used by widgets which implement the unchecked method.
 */
trait HasUnchecked
{
    protected array $uncheckAttributes = [];
    protected mixed $uncheckValue = null;

    /**
     * Set the `HTML` attributes for unchecked elements.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified unchecked attributes.
     */
    public function uncheckAttributes(array $values): static
    {
        $new = clone $this;
        $new->uncheckAttributes = array_merge($this->uncheckAttributes, $values);

        return $new;
    }

    /**
     * Set the `CSS` class for the unchecked element.
     *
     * @return static A new instance of the current class with the specified unchecked class.
     */
    public function uncheckClass(string $class): static
    {
        $new = clone $this;
        CssClass::add($new->uncheckAttributes, $class);

        return $new;
    }

    /**
     * set the value content attribute gives the default value of the unchecked field.
     *
     * @param mixed $value The value of the unchecked field.
     *
     * @return static A new instance of the current class with the specified unchecked value.
     */
    public function uncheckValue(mixed $value): static
    {
        $new = clone $this;
        $new->uncheckValue = $value;

        return $new;
    }
}
