<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement container methods.
 */
trait HasContainer
{
    protected array $containerAttributes = [];

    /**
     * Enable or disable the container tag.
     *
     * @param bool $value `true` to enable the container, `false` to disable.
     *
     * @return static A new instance of the current class with the specified container.
     */
    public function container(bool $value): static
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified container attributes.
     */
    public function containerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->containerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified container class.
     */
    public function containerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the container tag name.
     *
     * @param string $value The tag name for the container element.
     *
     * @throws InvalidArgumentException If the container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified container tag.
     */
    public function containerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->containerTag = $value;

        return $new;
    }
}
