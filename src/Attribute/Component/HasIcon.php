<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets that implement the icon methods.
 */
trait HasIcon
{
    protected array $iconAttributes = [];
    protected bool $iconContainer = true;
    protected array $iconContainerAttributes = [];
    protected string $iconText = '';

    /**
     * @return array The `HTML` attributes of the icon of the menu item.
     */
    public function getIconAttributes(): array
    {
        return $this->iconAttributes;
    }

    /**
     * @return array The `HTML` attributes of the icon container of the menu item.
     */
    public function getIconContainerAttributes(): array
    {
        return $this->iconContainerAttributes;
    }

    /**
     * @return string The icon of the menu item.
     */
    public function getIconText(): string
    {
        return $this->iconText;
    }

    /**
     * Set the `HTML` attributes for the icon.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified icon attributes.
     */
    public function iconAttributes(array $values): static
    {
        $new = clone $this;
        $new->iconAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the icon.
     *
     * @param string $value The icon CSS class.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified icon CSS class.
     */
    public function iconClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->iconAttributes, $value, $override);

        return $new;
    }

    /**
     * Enable or disable the icon container tag.
     *
     * @param bool $value The value indicating whether to add a div tag to the icon extra wrapper.
     */
    public function iconContainer(bool $value): static
    {
        $new = clone $this;
        $new->iconContainer = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the icon container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified icon container attributes.
     */
    public function iconContainerAttributes(array $values): static
    {
        $new = clone $this;
        $new->iconContainerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the icon container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified icon container CSS class.
     */
    public function iconContainerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->iconContainerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the icon `HTML` content.
     *
     * @param string $value The icon `HTML` content.
     *
     * @return static A new instance of the current class with the specified icon content.
     */
    public function iconText(string $value): static
    {
        $new = clone $this;
        $new->iconText = Encode::santizeXSS($value);

        return $new;
    }
}
