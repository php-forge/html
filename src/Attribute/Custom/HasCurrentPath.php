<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the current path method.
 */
trait HasCurrentPath
{
    protected string $currentPath = '';

    /**
     * Set the current path.
     *
     * @param string $value The current path.
     *
     * @return static A new instance of the current class with the specified current path.
     */
    public function currentPath(string $value): static
    {
        $new = clone $this;
        $new->currentPath = $value;

        return $new;
    }
}
