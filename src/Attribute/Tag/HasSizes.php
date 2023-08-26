<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use function implode;

/**
 * Is used by widgets that implement the sizes method.
 */
trait HasSizes
{
    /**
     * Set one or more strings separated by commas, indicating a set of source sizes.
     *
     * @param string ...$value The sizes attribute.
     *
     * @return static A new instance of the current class with the specified sizes value.
     *
     * @link https://www.w3.org/TR/html52/embedded-content-0.html#attr-img-sizes
     */
    public function sizes(string ...$value): static
    {
        $new = clone $this;
        $new->attributes['sizes'] = implode(', ', $value);

        return $new;
    }
}
