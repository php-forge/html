<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the start method.
 */
trait HasStart
{
    /**
     * The start attribute specifies the value of the first list item in an ordered list.
     *
     * @param int $value The value of the first list item in an ordered list.
     *
     * @return static A new instance of the current class with the specified start value.
     *
     * @link https://html.spec.whatwg.org/multipage/grouping-content.html#attr-ol-start
     */
    public function start(int $value): static
    {
        $new = clone $this;
        $new->attributes['start'] = $value;

        return $new;
    }
}
