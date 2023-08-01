<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which have an current path property.
 */
trait HasCurrentPath
{
    protected string $currentPath = '';

    /**
     * Returns a new instance specifying the current path.
     *
     * @param string $value The current path.
     */
    public function currentPath(string $value): static
    {
        $new = clone $this;
        $new->currentPath = $value;

        return $new;
    }
}
