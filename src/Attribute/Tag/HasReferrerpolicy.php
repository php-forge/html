<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;

/**
 * Is used by widgets which have a referrerpolicy attribute.
 */
trait HasReferrerpolicy
{
    /**
     * @psalm-var string[] $referrerpolicyValues
     */
    private array $referrerpolicyValues = [
        'no-referrer',
        'no-referrer-when-downgrade',
        'origin',
        'origin-when-cross-origin',
        'same-origin',
        'strict-origin',
        'strict-origin-when-cross-origin',
        'unsafe-url',
    ];

    /**
     * Returns a new instance specifying a string indicating which referrer to use when fetching the resource.
     *
     * @param string $value The referrerPolicy value.
     * Values allowed are: `no-referrer`, `no-referrer-when-downgrade`, `origin`, `origin-when-cross-origin`,
     * `same-origin`.
     */
    public function referrerpolicy(string $value): static
    {
        $values = implode('", "', $this->referrerpolicyValues);

        if ($value === '' || !in_array($value, $this->referrerpolicyValues, true)) {
            throw new InvalidArgumentException("The referrerpolicy attribute value must be one of \"$values\".");
        }

        $new = clone $this;
        $new->attributes['referrerpolicy'] = $value;

        return $new;
    }
}
