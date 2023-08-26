<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the href method.
 */
trait HasHref
{
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
}
