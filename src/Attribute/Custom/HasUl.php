<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement ul methods.
 */
trait HasUl
{
    protected array $ulAttributes = [];
    protected bool $ulContainer = true;
    protected array $ulContainerAttributes = [];

    /**
     * Set the `HTML` attributes for the `<ul>` tag.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified `<ul>` attributes.
     */
    public function ulAttributes(array $values): static
    {
        $new = clone $this;
        $new->ulAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the `<ul>` tag.
     *
     * @param string $value The CSS class name.
     *
     * @return static A new instance of the current class with the specified `<ul>` class.
     */
    public function ulClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->ulAttributes, $value);

        return $new;
    }

    /**
     * Enable or disable the container tag for tag `<ul>`.
     *
     * @param bool $value `true` to enable the container, `false` to disable.
     *
     * @return static A new instance of the current class with the specified container for tag `<ul>`.
     */
    public function ulContainer(bool $value): static
    {
        $new = clone $this;
        $new->ulContainer = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the container for tag `<ul>`.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified container attributes for tag `<ul>`.
     */
    public function ulContainerAttributes(array $values): static
    {
        $new = clone $this;
        $new->ulContainerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the container for tag `<ul>`.
     *
     * @param string $value The CSS class name.
     *
     * @return static A new instance of the current class with the specified container class for tag `<ul>`.
     */
    public function ulContainerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->ulContainerAttributes, $value);

        return $new;
    }
}
