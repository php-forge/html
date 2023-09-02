<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which implement the disabled method.
 */
trait HasDisabled
{
    protected bool $disabled = false;

    /**
     * Set the disabled state.
     *
     * @return static A new instance of the current class with the specified disabled state.
     */
    public function disabled(): static
    {
        $new = clone $this;
        $new->disabled = true;

        return $new;
    }

    /**
     * @return bool Whether the menu item is disabled.
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }
}
