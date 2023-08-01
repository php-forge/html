<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have a cols attribute.
 */
trait HasCols
{
    /**
     * Returns a new instance specifying the maximum number of characters per line of text for the UA to show.
     *
     * @param int $value The maximum number of characters per line of text for the UA to show.
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
