<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have a http-equiv attribute.
 */
trait HasHttpEquiv
{
    /**
     * Returns a new instance specifying the name of the HTTP header to define.
     *
     * @param string $value The name of the HTTP header to define.
     * @param string $content The value of the HTTP header to define.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#attr-meta-http-equiv
     */
    public function httpEquiv(string $value, string $content): static
    {
        $new = clone $this;
        $new->attributes['http-equiv'] = $value;
        $new->attributes['content'] = $content;

        return $new;
    }
}
