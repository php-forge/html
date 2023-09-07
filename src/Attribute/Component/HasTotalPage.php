<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the total pages methods.
 */
trait HasTotalPage
{
    protected int $totalPage = 1;

    /**
     * Set the total page.
     *
     * @param int $value The total page.
     *
     * @return static A new instance of the current class with the specified total page.
     */
    public function totalPage(int $value): static
    {
        $new = clone $this;
        $new->totalPage = $value;

        return $new;
    }
}
