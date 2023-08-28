<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement container methods.
 */
trait HasContainer
{
    protected array $containerAttributes = [];
    protected string $containerPrefix = '';
    protected string $containerSuffix = '';

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
     *
     * @return static A new instance of the current class with the specified container class.
     */
    public function containerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value);

        return $new;
    }

    /**
     * Set the `HTML` container prefix content.
     *
     * @param string|ElementInterface ...$values The `HTML` container prefix content.
     *
     * @return static A new instance of the current class with the specified container prefix content.
     */
    public function containerPrefix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->containerPrefix = Encode::create()->santizeXSS(...$values);

        return $new;
    }

    /**
     * Set the `HTML` container suffix content.
     *
     * @param string|ElementInterface ...$values The `HTML` container suffix content.
     *
     * @return static A new instance of the current class with the specified container suffix content.
     */
    public function containerSuffix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->containerSuffix = Encode::create()->santizeXSS(...$values);

        return $new;
    }

    /**
     * Set the container tag name.
     *
     * @param string $value The tag name for the container element.
     *
     * @return static A new instance of the current class with the specified container tag.
     *
     * @throws InvalidArgumentException If the container tag is an empty string.
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
