<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets that implement the hidden method.
 */
trait CanBeHidden
{
    /**
     * Set the hidden global attribute is an enumerated attribute indicating that the browser should not render the
     * contents of the element.
     *
     * @return static A new instance of the current class with the specified hidden value.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#the-hidden-attribute
     */
    public function hidden(): static
    {
        $new = clone $this;
        $new->attributes['hidden'] = true;

        return $new;
    }
}
