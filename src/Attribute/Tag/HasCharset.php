<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets that implement the charset method.
 */
trait HasCharset
{
    /**
     * Set the character encoding of the linked resource.
     *
     * @param string $value The character encoding of the linked resource.
     *
     * @return static A new instance of the current class with the specified charset value.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#attr-link-charset
     */
    public function charset(string $value): static
    {
        $new = clone $this;
        $new->attributes['charset'] = Encode::content($value);

        return $new;
    }
}
