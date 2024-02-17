<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Contract;

/**
 * Provide methods for handling HTML src attributes.
 */
interface SrcInterface
{
    /**
     * Set the source attribute valid for the image input button or img only, the src is string specifying the URL of
     * the image file to display to represent the graphical submitted button.
     *
     * @param string|null $value The source of the widget.
     *
     * @return static A new instance of the current class with the specified source value.
     *
     * @link https://www.w3.org/TR/html52/embedded-content-0.html#attr-img-srcset
     */
    public function src(string $value = null): static;
}
