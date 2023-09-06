<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets that implement the disable class method.
 */
trait HasDisabledClass
{
    protected string $disabledClass = 'disabled';

    /**
     * Set the disabled class.
     *
     * @param string $value The `CSS` class to be appended to the disabled class.
     *
     * @return static A new instance of the current class with the specified disabled class.
     */
    public function disabledClass(string $value): static
    {
        $new = clone $this;
        $new->disabledClass = $value;

        return $new;
    }
}
