<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which have a src attribute.
 *
 * @link https://www.w3.org/TR/html52/embedded-content-0.html#attr-img-srcset
 */
trait HasSrc
{
    /**
     * Returns a new instance specifying the source attribute valid for the image input button or img only, the src is
     * string specifying the URL of the image file to display to represent the graphical submit button.
     *
     * @param string $value The source of the widget.
     */
    public function src(string $value): static
    {
        $new = clone $this;
        $new->attributes['src'] = $value;

        return $new;
    }
}
