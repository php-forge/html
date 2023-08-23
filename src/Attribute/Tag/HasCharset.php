<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets which have a charset attribute.
 */
trait HasCharset
{
    /**
     * Returns a new instance specifying the character encoding of the linked resource.
     *
     * @param string $value The character encoding of the linked resource.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#attr-link-charset
     */
    public function charset(string $value): static
    {
        $new = clone $this;
        $new->attributes['charset'] = Encode::create()->content($value);

        return $new;
    }
}
