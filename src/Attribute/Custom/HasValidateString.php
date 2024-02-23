<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

use function is_string;
use function sprintf;

/**
 * Is used by widgets which implement the validate string method.
 */
trait HasValidateString
{
    /**
     * Validate if the value is a string or null based on the type.
     *
     * @param mixed $value The value to validate.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateString(mixed $value): void
    {
        if ($value !== null && !is_string($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }
    }
}
