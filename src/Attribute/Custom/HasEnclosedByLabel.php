<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the enclosedByLabel method.
 */
trait HasEnclosedByLabel
{
    protected bool $enclosedByLabel = false;

    /**
     * Set the current instance as being enclosed by a label.
     *
     * @param bool $value The value to set.
     *
     * @return static A new instance of of the current class with the specified enclosed by label property.
     */
    public function enclosedByLabel(bool $value): static
    {
        $new = clone $this;
        $new->enclosedByLabel = $value;

        return $new;
    }
}
