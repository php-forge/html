<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the activate items method.
 */
trait HasActivateItems
{
    protected bool $activateItems = true;

    /**
     * Enable or disable the activation of menu items when their route is the currently requested one.
     *
     * @param bool $value Whether to activate menu items when their route is the currently requested one.
     *
     * @return static A new instance of the current class with the specified activated items value.
     */
    public function activateItems(bool $value): static
    {
        $new = clone $this;
        $new->activateItems = $value;

        return $new;
    }
}
