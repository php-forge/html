<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the prefix and suffix methods.
 */
trait HasPrefixAndSuffix
{
    protected bool $prefixContainer = false;
    protected array $prefixContainerAttributes = [];
    protected string $prefixContainerTag = 'div';
    protected string $prefix = '';
    protected string $suffix = '';
    protected bool $suffixContainer = false;
    protected array $suffixContainerAttributes = [];
    protected string $suffixContainerTag = 'div';

    /**
     * Set the `HTML` prefix content.
     *
     * @param ElementInterface|string ...$values The `HTML` prefix content.
     *
     * @return static A new instance of the current class with the specified prefix content.
     */
    public function prefix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->prefix = Encode::santizeXSS(...$values);

        return $new;
    }

    /**
     * Enable or disable the prefix container.
     *
     * @param bool $value The prefix container value.
     *
     * @return static A new instance of the current class with the specified prefix container value.
     */
    public function prefixContainer(bool $value): static
    {
        $new = clone $this;
        $new->prefixContainer = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the prefix container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified prefix container attributes.
     */
    public function prefixContainerAttributes(array $values): static
    {
        $new = clone $this;
        $new->prefixContainerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the prefix container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified prefix container class.
     */
    public function prefixContainerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->prefixContainerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the prefix container tag name.
     *
     * @param string $value The tag name for the prefix container element.
     *
     * @throws InvalidArgumentException If the prefix container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified prefix container tag.
     */
    public function prefixContainerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The prefix container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->prefixContainerTag = $value;

        return $new;
    }

    /**
     * Set the `HTML` suffix content.
     *
     * @param ElementInterface|string ...$values The `HTML` suffix content.
     *
     * @return static A new instance of the current class with the specified suffix content.
     */
    public function suffix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->suffix = Encode::santizeXSS(...$values);

        return $new;
    }

    /**
     * Enable or disable the suffix container.
     *
     * @param bool $value The suffix container value.
     *
     * @return static A new instance of the current class with the specified suffix container value.
     */
    public function suffixContainer(bool $value): static
    {
        $new = clone $this;
        $new->suffixContainer = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the suffix container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified suffix container attributes.
     */
    public function suffixContainerAttributes(array $values): static
    {
        $new = clone $this;
        $new->suffixContainerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the suffix container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified suffix container class.
     */
    public function suffixContainerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->suffixContainerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the suffix container tag name.
     *
     * @param string $value The tag name for the suffix container element.
     *
     * @throws InvalidArgumentException If the suffix container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified suffix container tag.
     */
    public function suffixContainerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The suffix container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->suffixContainerTag = $value;

        return $new;
    }
}
