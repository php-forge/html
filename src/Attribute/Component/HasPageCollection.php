<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the page collection.
 */
trait HasPageCollection
{
    protected int $page = 1;
    protected string $pageName = 'page';

    /**
     * Set the current page.
     *
     * @param int $value The current page.
     *
     * @return static A new instance of the current class with the specified current page.
     */
    public function page(int $value): static
    {
        $new = clone $this;
        $new->page = $value;

        return $new;
    }

    /**
     * Set the name of query parameter for page.
     *
     * @param string $value The name of query parameter for page.
     *
     * @return static A new instance of the current class with the specified page.
     */
    public function pageName(string $value): static
    {
        $new = clone $this;
        $new->pageName = $value;

        return $new;
    }
}
