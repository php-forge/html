<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the height method.
 */
trait HasHeight
{
    /**
     * Set the height attribute valid for the image input button or img only, the height of the image file to display to
     * represent the graphical submitted button.
     *
     * Must be an integer without a unit or a percentage value, i.e., a number followed immediately by "%".
     *
     * @param int|string $value The width of the widget.
     *
     * @return static A new instance of the current class with the specified height value.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content-other.html#attr-dim-width
     */
    public function height(int|string $value): static
    {
        $new = clone $this;
        $new->attributes['height'] = $value;

        return $new;
    }
}
