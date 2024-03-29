<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the activeClass method.
 */
trait HasActiveClass
{
    protected string $activeClass = 'active';
    protected bool $override = false;

    /**
     * Set the `CSS` class to be appended to the active class.
     *
     * @param string $value The `CSS` class to be appended to the active class.
     * @param bool $override Whether to override the current active class or not.
     *
     * @return static A new instance of the current class with the specified active class.
     */
    public function activeClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        $new->activeClass = $value;
        $new->override = $override;

        return $new;
    }
}
