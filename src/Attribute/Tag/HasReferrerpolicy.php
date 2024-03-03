<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Helper\Validator;

/**
 * Is used by widgets that implement the referrerpolicy method.
 */
trait HasReferrerpolicy
{
    /**
     * Returns a new instance specifying a string indicating which referrer to use when fetching the resource.
     *
     * @param string $value The referrerPolicy value.
     * Values allowed are: `no-referrer`, `no-referrer-when-downgrade`, `origin`, `origin-when-cross-origin`,
     * `same-origin`.
     *
     * @throws InvalidArgumentException If the value is not one of: "no-referrer", "no-referrer-when-downgrade",
     * "origin", "origin-when-cross-origin", "same-origin", "strict-origin", "strict-origin-when-cross-origin",
     * "unsafe-url".
     *
     * @return static A new instance of the current class with the specified referrerpolicy value.
     */
    public function referrerpolicy(string $value): static
    {
        Validator::inList(
            $value,
            'Invalid value "%s" for the referrerpolicy attribute. Allowed values are: "%s".',
            'no-referrer',
            'no-referrer-when-downgrade',
            'origin',
            'origin-when-cross-origin',
            'same-origin',
            'strict-origin',
            'strict-origin-when-cross-origin',
            'unsafe-url'
        );

        $new = clone $this;
        $new->attributes['referrerpolicy'] = $value;

        return $new;
    }
}
