<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\CssClass;
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
        $new->menu = Encode::santizeXSS(...$values);

        return $new;
    }

    /**
     * Set the `HTML` attributes for the menu.
     *
     * @return static A new instance of the current class with the specified attributes for the menu.
     */
    public function menuAttributes(array $value): static
    {
        $new = clone $this;
        $new->menuAttributes = $value;

        return $new;
    }

    /**
     * Set the `CSS` `HTML` class attribute for the menu.
     *
     * @param string $value The `CSS` attribute of the menu.
     *
     * @return static A new instance of the current class with the specified class value for the menu.
     */
    public function menuClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->menuAttributes, $value);

        return $new;
    }
}
