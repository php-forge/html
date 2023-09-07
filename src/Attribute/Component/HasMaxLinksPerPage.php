<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the hideOnSinglePage method.
 */
trait HasMaxLinksPerPage
{
    protected int $maxLinksPerPage = 10;

    /**
     * Set the maximum number of page buttons that can be displayed.
     *
     * @param int $value Maximum number of page buttons that can be displayed.
     *
     * @return static A new instance of the current class with the specified maximum number of page buttons that can be
     * displayed.
     */
    public function maxLinksPerPage(int $value): static
    {
        $new = clone $this;
        $new->maxLinksPerPage = $value;

        return $new;
    }
}
