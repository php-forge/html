<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use function implode;

/**
 * Is used by widgets that implement the srcset method.
 */
trait HasSrcset
{
    /**
     * Set one or more strings separated by commas, indicating possible image sources for the user agent to use.
     *
     * @param string ...$value The source set of the widget.
     *
     * @return static A new instance of the current class with the specified srcset value.
     *
     * @link https://www.w3.org/TR/html52/embedded-content-0.html#attr-img-srcset
     */
    public function srcset(string ...$value): static
    {
        $new = clone $this;
        $new->attributes['srcset'] = implode(', ', $value);

        return $new;
    }
}
