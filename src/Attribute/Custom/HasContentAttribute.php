<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;

/**
 * Is used by widgets that implement the content attribute.
 */
trait HasContentAttribute
{
    /**
     * Sets the content attributes.
     *
     * @param string $value The content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string $value): static
    {
        $new = clone $this;
        $new->attributes['content'] = Encode::content($value);

        return $new;
    }
}
