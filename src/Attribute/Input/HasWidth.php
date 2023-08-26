<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the width method.
 */
trait HasWidth
{
    /**
     * Set the width attribute valid for the image input button or img only, the width of the image file to display to
     * represent the graphical submit button.
     *
     * Must be an integer without a unit or a percentage value, i.e. a number followed immediately by "%".
     *
     * @param int $value The width of the widget.
     *
     * @return static A new instance of the current class with the specified width value.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content-other.html#attr-dim-width
     */
    public function width(int|string $value): static
    {
        $new = clone $this;
        $new->attributes['width'] = $value;

        return $new;
    }
}
