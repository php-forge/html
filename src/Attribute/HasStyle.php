<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets that implement the style method.
 */
trait HasStyle
{
    /**
     * Set the style attribute with CSS rules to be applied to the widget.
     *
     * @param string $value The CSS rules for the style attribute.
     *
     * @return static A new instance of the current class with the specified style value.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-style-attribute
     */
    public function style(string $value): static
    {
        $new = clone $this;
        $new->attributes['style'] = $value;

        return $new;
    }
}
