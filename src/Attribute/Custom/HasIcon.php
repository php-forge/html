<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by components that can have an icon tag.
 */
trait HasIcon
{
    protected array $iconAttributes = [];
    protected bool $iconContainer = true;
    protected array $iconContainerAttributes = [];
    protected string $iconText = '';

    /**
     * Returns a new instance with the HTML attributes for rendering the `<i>` tag for the icon.
     *
     * @param array $valuesMap Attribute values indexed by attribute names.
     *
     * {@see Html::renderTagAttributes()} For details on how attributes are being rendered.
     */
    public function iconAttributes(array $valuesMap): static
    {
        $new = clone $this;
        $new->iconAttributes = $valuesMap;

        return $new;
    }

    /**
     * Returns a new instance with the icon CSS class.
     *
     * @param string $value The icon CSS class.
     */
    public function iconClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->iconAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying when allows you to add a div tag to the icon extra wrapper.
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
     * Returns a new instance with the HTML attributes for rendering icon container.
     *
     * The rest of the options will be rendered as the HTML attributes of the icon container.
     *
     * @param array $valuesMap Attribute values indexed by attribute names.
     *
     * {@see Html::renderTagAttributes()} For details on how attributes are being rendered.
     */
    public function iconContainerAttributes(array $valuesMap): static
    {
        $new = clone $this;
        $new->iconContainerAttributes = $valuesMap;

        return $new;
    }

    /**
     * Returns a new instance with the CSS class for the icon container.
     *
     * @param string $value The CSS class name.
     */
    public function iconContainerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->iconContainerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the icon text.
     *
     * @param string $value The icon text.
     */
    public function iconText(string $value): static
    {
        $new = clone $this;
        $new->iconText = $value;

        return $new;
    }
}
