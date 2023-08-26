<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets that implement the lang method.
 */
trait HasLang
{
    /**
     * Set the lang global attribute has text representing advisory information
     *
     * @param string $value The lang of the widget. The attribute contains a single "language tag" in the format defined
     * in RFC 5646: Tags for Identifying Languages (also known as `BCP 47`).
     *
     * @return static A new instance of the current class with the specified lang value.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-lang
     * @link https://tools.ietf.org/html/rfc5646
     */
    public function lang(string $value): static
    {
        $new = clone $this;
        $new->attributes['lang'] = Encode::create()->content($value);

        return $new;
    }
}
