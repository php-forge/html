<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets that implement the httpEquiv method.
 */
trait HasHttpEquiv
{
    /**
     * Set the name of the HTTP header to define.
     *
     * @param string $value The name of the HTTP header to define.
     * @param string $content The value of the HTTP header to define.
     *
     * @return static A new instance of the current class with the specified http-equiv value.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#attr-meta-http-equiv
     */
    public function httpEquiv(string $value, string $content): static
    {
        $new = clone $this;
        $new->attributes['http-equiv'] = Encode::create()->value($value);
        $new->attributes['content'] = Encode::create()->content($content);

        return $new;
    }
}
