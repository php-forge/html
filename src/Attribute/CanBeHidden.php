<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets which have an hidden attribute.
 */
trait CanBeHidden
{
    /**
     * Returns a new instance specifying that the hidden global attribute is an enumerated attribute indicating that the
     * browser should not render the contents of the element.
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
