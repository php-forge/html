<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use function implode;

/**
 * Is used by widgets which have a sizes attribute.
 */
trait HasSizes
{
    /**
     * Returns a new instance specifying one or more strings separated by commas, indicating a set of source sizes.
     *
     * @param string ...$value The sizes attribute.
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
