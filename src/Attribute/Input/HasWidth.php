<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which have a width attribute.
 */
trait HasWidth
{
    /**
     * Returns a new instance specifying the width attribute valid for the image input button or img only, the width
     * of the image file to display to represent the graphical submit button.
     *
     * Must be an integer without a unit.
     *
     * @param int $value The width of the widget.
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
