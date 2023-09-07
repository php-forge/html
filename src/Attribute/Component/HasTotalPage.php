<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the total pages methods.
 */
trait HasTotalPage
{
    protected int $totalPages = 1;

    /**
     * Set the total pages.
     *
     * @param int $value The total pages.
     */
    public function totalPages(int $value): static
    {
        $new = clone $this;
        $new->totalPages = $value;

        return $new;
    }
}
