<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

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
     */
    public function referrerpolicy(string $value): static
    {
        $allowedReferrerpolicyValues = [
            'no-referrer',
            'no-referrer-when-downgrade',
            'origin',
            'origin-when-cross-origin',
            'same-origin',
            'strict-origin',
            'strict-origin-when-cross-origin',
            'unsafe-url',
        ];

        if (in_array($value, $allowedReferrerpolicyValues, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The referrerpolicy value must be one of the following: %s',
                    implode(', ', $allowedReferrerpolicyValues)
                )
            );
        }

        $new = clone $this;
        $new->attributes['referrerpolicy'] = $value;

        return $new;
    }
}
