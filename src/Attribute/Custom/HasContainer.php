<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;

/**
 * Provides methods to configure the HTML container.
 */
trait HasContainer
{
    protected bool $container = true;
    protected array $containerAttributes = [];

    /**
     * Return new instance specifying when the container its enabled or disabled.
     *
     * @param bool $value `true` to enable container, `false` to disable.
     */
    public function container(bool $value): static
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the `HTML` container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     */
    public function containerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->containerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance specifying the `CSS` HTML container class name.
     *
     * @param string $value The css class name.
     */
    public function containerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value);

        return $new;
    }

    /**
     * Return new instance specified the tag name for the container element.
     *
     * @param string $value The tag name for the container element.
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
