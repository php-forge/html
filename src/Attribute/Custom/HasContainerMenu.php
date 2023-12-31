<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement container menu methods.
 */
trait HasContainerMenu
{
    protected bool $containerMenu = true;
    protected array $containerMenuAttributes = [];
    protected string $containerMenuTag = 'nav';

    /**
     * Enable or disable the container menu tag.
     *
     * @param bool $value `true` to enable the container menu, `false` to disable.
     *
     * @return static A new instance of the current class with the specified container menu.
     */
    public function containerMenu(bool $value): static
    {
        $new = clone $this;
        $new->containerMenu = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the container menu.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified container menu attributes.
     */
    public function containerMenuAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->containerMenuAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the container menu.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified container menu class.
     */
    public function containerMenuClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->containerMenuAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the container menu tag name.
     *
     * @param string $value The tag name for the container menu element.
     *
     * @throws InvalidArgumentException If the container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified container menu tag.
     */
    public function containerMenuTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The container menu tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->containerMenuTag = $value;

        return $new;
    }
}
