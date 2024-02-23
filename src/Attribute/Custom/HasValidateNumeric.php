<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

use function is_numeric;
use function sprintf;

/**
 * Is used by widgets which implement the validate numeric method.
 */
trait HasValidateNumeric
{
    /**
     * Validate if the value is numeric or null based on the type.
     *
     * @param mixed $value The value to validate.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateNumeric(mixed $value): void
    {
        if ($value !== null && $value !== '' && !is_numeric($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a numeric or null value.', static::class)
            );
        }
    }
}
