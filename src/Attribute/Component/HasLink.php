<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\CssClass;

use function array_merge;

/**
 * Is used by widgets that implement the link methods.
 */
trait HasLink
{
    protected string $link = '';
    protected array $linkAttributes = [];

    /**
     * @return string The link of the menu item.
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return array The `HTML` attributes of the href of the menu item.
     */
    public function getLinkAttributes(): array
    {
        return $this->linkAttributes;
    }

    /**
     * Set the link of the menu item.
     *
     * @param string $value The link of the menu item.
     *
     * @return static A new instance of the current class with the specified link.
     */
    public function link(string $value): static
    {
        $new = clone $this;
        $new->link = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the link tag.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified link attributes.
     */
    public function linkAttributes(array $values): static
    {
        $new = clone $this;
        $new->linkAttributes = array_merge($this->linkAttributes, $values);

        return $new;
    }

    /**
     * Set the `CSS` class for the link tag.
     *
     * @param string $value The `CSS` class for the link tag.
     *
     * @return static A new instance of the current class with the specified link class.
     */
    public function linkClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->linkAttributes, $value);

        return $new;
    }
}
