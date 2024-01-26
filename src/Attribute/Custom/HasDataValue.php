<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the data value method.
 */
trait HasDataValue
{
    protected string|null $dataValue = null;

    /**
     * Set the `HTML` data-value attribute for the toggle.
     *
     * @param string $value The data-value attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataValue(string $value): static
    {
        $new = clone $this;
        $new->dataValue = $value;
        return $new;
    }
}
