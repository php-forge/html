<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets which have a accept-charset attribute.
 */
trait HasAcceptCharset
{
    /**
     * Returns a new instances with the accept-charset content attribute gives the character encodings that are to be
     * used for the submission. If specified, the value must be an ordered set of unique space-separated tokens that are
     * ASCII case-insensitive, and each token must be an ASCII case-insensitive match for one of the labels of an
     * ASCII-compatible encoding.
     *
     * @param string $value The accept-charset attribute value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-accept-charset
     */
    public function acceptCharset(string $value): static
    {
        $new = clone $this;
        $new->attributes['accept-charset'] = Encode::content($value);

        return $new;
    }
}
