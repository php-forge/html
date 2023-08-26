<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the alt method.
 */
trait HasAlt
{
    /**
     * Set the alt attribute, provide the alternative text valid for the image button or img only, displaying the value
     * of the attribute if the image src is missing or otherwise fails to load.
     *
     * @param string $value The alternative text.
     *
     * @return static A new instance of the current class with the specified alt value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-alt
     */
    public function alt(string $value): static
    {
        $new = clone $this;
        $new->attributes['alt'] = $value;

        return $new;
    }
}
