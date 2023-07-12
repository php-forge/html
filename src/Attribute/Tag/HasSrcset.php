<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use function implode;

/**
 * Is used by widgets which have an srcset attribute.
 *
 * @link https://www.w3.org/TR/html52/embedded-content-0.html#attr-img-srcset
 */
trait HasSrcset
{
    /**
     * Returns a new instance specifying one or more strings separated by commas, indicating possible image sources for
     * the user agent to use.
     *
     * @param string ...$value The source set of the widget.
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
