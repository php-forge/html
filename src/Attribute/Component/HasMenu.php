<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\{Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement menu methods.
 */
trait HasMenu
{
    protected string $menu = '';
    protected array $menuAttributes = [];

    /**
     * Set the menu items.
     *
     * @param RenderInterface|string ...$values The menu items.
     *
     * @return static A new instance of the current class with the specified menu items.
     */
    public function menu(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->menu = Sanitize::html(...$values);

        return $new;
    }
}
