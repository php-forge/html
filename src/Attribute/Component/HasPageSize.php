<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the page size methods.
 */
trait HasPageSize
{
    protected int $pageSize = 10;
    protected string $pageSizeName = 'page-size';

    /**
     * Set the page size.
     *
     * @param int $value The page size.
     *
     * @return static A new instance of the current class with the specified page size.
     */
    public function pageSize(int $value): static
    {
        $new = clone $this;
        $new->pageSize = $value;

        return $new;
    }

    /**
     * Set the name of a=query parameter for page size.
     *
     * @param string $value The name of query parameter for page size.
     *
     * @return static A new instance of the current class with the specified name of query parameter for page size.
     */
    public function pageSizeName(string $value): static
    {
        $new = clone $this;
        $new->pageSizeName = $value;

        return $new;
    }
}
