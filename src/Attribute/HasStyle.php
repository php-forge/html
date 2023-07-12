<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets which have a style attribute.
 */
trait HasStyle
{
    /**
     * Returns a new instance specifying the style attribute with CSS rules to be applied to the widget.
     *
     * @param string $value The CSS rules for the style attribute.
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
