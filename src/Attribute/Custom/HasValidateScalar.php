<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

use function is_scalar;
use function sprintf;

/**
 * Is used by widgets which implement the validate scalar method.
 */
trait HasValidateScalar
{
    /**
     * Validate if the value is a scalar or null based on the type.
     *
     * @param mixed ...$values The values to validate.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateScalar(mixed ...$values): void
    {
        foreach ($values as $value) {
            if (is_scalar($value) === false && $value !== null) {
                throw new InvalidArgumentException(sprintf('%s::class widget must be a scalar value.', static::class));
            }
        }
    }
}
