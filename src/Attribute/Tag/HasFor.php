<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the for method.
 */
trait HasFor
{
    /**
     * Set the id of a labeled form-related element in the same document as the tag label element.
     *
     * The first element in the document with an id matching the value of the for attribute is the labeled control for
     * this label element if it's a labeled element.
     *
     * @param string|null $value The id of a labeled form-related element in the same document as the tag label
     * element. If null, the attribute will be removed.
     *
     * @return static A new instance of the current class with the specified for value.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/label.html#label.attrs.for
     */
    public function for(string $value = null): static
    {
        $new = clone $this;
        $new->attributes['for'] = $value;

        return $new;
    }
}
