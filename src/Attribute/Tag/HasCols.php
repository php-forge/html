<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the cols method.
 */
trait HasCols
{
    /**
     * Set the maximum number of characters per line of text for the UA to show.
     *
     * @param int $value The maximum number of characters per line of text for the UA to show.
     *
     * @return static A new instance of the current class with the specified cols value.
     *
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#attr-textarea-cols
     */
    public function cols(int $value): static
    {
        $new = clone $this;
        $new->attributes['cols'] = $value;

        return $new;
    }
}
