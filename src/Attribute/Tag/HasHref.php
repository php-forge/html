<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have a href attribute.
 */
trait HasHref
{
    /**
     * Returns a new instance specifying the URL that the hyperlink points to.
     *
     * Links aren't restricted to HTTP-based URLs they can use any URL scheme supported by browsers.
     *
     * @param string $value The URL that the hyperlink points to.
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
