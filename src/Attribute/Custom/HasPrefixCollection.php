<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\{Html\Helper\CssClass, Html\Helper\Encode, Html\Tag, Widget\ElementInterface};

/**
 * Is used by widgets that implement the prefix collection.
 */
trait HasPrefixCollection
{
    protected bool $prefixContainer = false;
    protected array $prefixContainerAttributes = [];
    protected string $prefixContainerTag = 'div';
    protected string $prefix = '';

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
        $new->prefix = Encode::sanitizeXSS(...$values);

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
     * Render the prefix container.
     *
     * @return string The prefix container.
     */
    private function renderPrefixTag(): string
    {
        return match ($this->prefixContainer) {
            true => Tag::widget()
                ->attributes($this->prefixContainerAttributes)
                ->content($this->prefix)
                ->tagName($this->prefixContainerTag)
                ->render(),
            false => $this->prefix,
        };
    }
}
