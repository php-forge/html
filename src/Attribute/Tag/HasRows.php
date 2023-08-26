<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the rows method.
 */
trait HasRows
{
    /**
     * Set the number of lines of text for the UA to show.
     *
     * @param int $value The number of lines of text for the UA to show.
     *
     * @return static A new instance of the current class with the specified rows value.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.rows
     */
    public function rows(int $value): static
    {
        $new = clone $this;
        $new->attributes['rows'] = $value;

        return $new;
    }
}
