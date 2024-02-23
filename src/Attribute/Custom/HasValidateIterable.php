<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

use function is_iterable;
use function sprintf;

/**
 * Is used by widgets which implement the validate iterable method.
 */
trait HasValidateIterable
{
    /**
     * Validate if the value is an iterable or null based on the type.
     *
     * @param mixed $value The value to validate.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateIterable(mixed $value): void
    {
        if (!is_iterable($value) && $value !== null) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be an iterable or null value.', static::class)
            );
        }
    }
}
