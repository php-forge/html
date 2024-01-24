<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the accept method.
 */
trait HasAccept
{
    /**
     * Set the accepted attribute value is a string that defines the file types the file input should accept.
     * This string is a comma-separated list of unique file type specifiers.
     *
     * Because a given file type may be identified in more than one manner, it's useful to provide a thorough set of
     * type specifiers when you need files of a given format.
     *
     * @param string $value The value of the accepted attribute.
     *
     * @return static A new instance of the current class with the specified accepted value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-accept
     */
    public function accept(string $value): static
    {
        $new = clone $this;
        $new->attributes['accept'] = $value;

        return $new;
    }
}
