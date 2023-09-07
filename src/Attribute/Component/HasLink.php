<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets that implement the link method.
 */
trait HasLink
{
    protected string $link = '';

    /**
     * @return string The link of the menu item.
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Set the link of the menu item.
     *
     * @param string $value The link of the menu item.
     *
     * @return static A new instance of the current class with the specified link.
     */
    public function link(string $value): static
    {
        $new = clone $this;
        $new->link = $value;

        return $new;
    }
}
