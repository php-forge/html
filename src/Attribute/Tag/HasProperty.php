<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the property method.
 */
trait HasProperty
{
    /**
     * Set the property attribute is used to specify the property the meta element
     *
     * @param string $value The property name.
     * @param string $content The property value.
     *
     * @return static A new instance of the current class with the specified property value.
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
