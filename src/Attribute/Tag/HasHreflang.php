<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the hreflang method.
 */
trait HasHreflang
{
    /**
     * Set the language of the linked resource.
     *
     * @param string $value The language of the linked resource.
     *
     * @return static A new instance of the current class with the specified hreflang value.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-hreflang
     * @link https://www.w3schools.com/tags/ref_language_codes.asp
     */
    public function hreflang(string $value): static
    {
        $new = clone $this;
        $new->attributes['hreflang'] = $value;

        return $new;
    }
}
