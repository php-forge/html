<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

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
     * @param ElementInterface|string ...$values The menu items.
     *
     * @return static A new instance of the current class with the specified menu items.
     */
    public function menu(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->menu = Encode::sanitizeXSS(...$values);

        return $new;
    }
}
