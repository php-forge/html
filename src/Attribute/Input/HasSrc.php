<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the src method.
 */
trait HasSrc
{
    /**
     * Set the source attribute valid for the image input button or img only, the src is string specifying the URL of
     * the image file to display to represent the graphical submit button.
     *
     * @param null|string $value The source of the widget.
     *
     * @return static A new instance of the current class with the specified source value.
     *
     * @link https://www.w3.org/TR/html52/embedded-content-0.html#attr-img-srcset
     */
    public function src(string $value = null): static
    {
        $new = clone $this;
        $new->attributes['src'] = $value;

        return $new;
    }
}
