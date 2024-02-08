<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the reversed method.
 */
trait HasReversed
{
    /**
     * Set the reversed attribute.
     *
     * @return static A new instance of the current class with the specified reversed value.
     *
     * @link https://html.spec.whatwg.org/multipage/grouping-content.html#attr-ol-reversed
     */
    public function reversed(): static
    {
        $new = clone $this;
        $new->attributes['reversed'] = true;

        return $new;
    }
}
