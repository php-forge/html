<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have an link class property.
 */
trait HasLinkClass
{
    protected string $linkClass = '';

    /**
     * Returns a new instance specifying the `CSS` class that will be assigned to the link.
     *
     * @param string $value The `CSS` class that will be assigned to the link.
     */
    public function linkClass(string $value): self
    {
        $new = clone $this;
        $new->linkClass = $value;

        return $new;
    }
}
