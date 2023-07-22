<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have a property attribute.
 */
trait HasProperty
{
    /**
     * Returns a new instance specifying the property name.
     *
     * @param string $value The property name.
     * @param string $content The property value.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#attr-meta-property
     */
    public function property(string $value, string $content): static
    {
        $new = clone $this;
        $new->attributes['property'] = $value;
        $new->attributes['content'] = $content;

        return $new;
    }
}
