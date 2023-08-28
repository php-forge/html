<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement the href method.
 */
trait HasHref
{
    protected array $hrefAttributes = [];

    /**
     * Set the URL that the hyperlink points to.
     *
     * Links aren't restricted to HTTP-based URLs they can use any URL scheme supported by browsers.
     *
     * @param string $value The URL that the hyperlink points to.
     *
     * @return static A new instance of the current class with the specified href value.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#ping
     */
    public function href(string $value): static
    {
        $new = clone $this;
        $new->attributes['href'] = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified href attributes.
     */
    public function hrefAttributes(array $values): static
    {
        $new = clone $this;
        $new->hrefAttributes = array_merge($this->hrefAttributes, $values);

        return $new;
    }

    /**
     * Set the `CSS` class.
     *
     * @param string $value The `CSS` class.
     *
     * @return static A new instance of the current class with the specified href class.
     */
    public function hrefClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->hrefAttributes, $value);

        return $new;
    }
}
