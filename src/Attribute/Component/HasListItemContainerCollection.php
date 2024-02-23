<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement container for list items collection.
 */
trait HasListItemContainerCollection
{
    protected bool $listItemContainer = false;
    protected array $listItemContainerAttributes = [];
    protected string $listItemContainerTag = 'div';

    /**
     * Enable or disable the container tag for list items.
     *
     * @param bool $value `true` to enable the container, `false` to disable.
     *
     * @return static A new instance of the current class with the specified container for list items.
     */
    public function listItemContainer(bool $value): static
    {
        $new = clone $this;
        $new->listItemContainer = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the container for list items.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified container attributes for list items.
     */
    public function listItemContainerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->listItemContainerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the container for list items.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified container class for list items.
     */
    public function listItemContainerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->listItemContainerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the container tag name for list items.
     *
     * @param string $value The tag name for the container element for list items.
     *
     * @throws InvalidArgumentException If the container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified container tag for list items.
     */
    public function listItemContainerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->listItemContainerTag = $value;

        return $new;
    }
}
