<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use RuntimeException;

/**
 * Is used by widgets which implement the validation method.
 */
trait HasWidgetValidation
{
    private function validateTagName(string $tagName, string ...$compare): void
    {
        if (in_array($tagName, $compare, true) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must have a tag name of %s.', static::class, implode(', ', $compare))
            );
        }
    }

    /**
     * Validate if the value is numeric or null based on the type.
     *
     * @param mixed $value The value to validate.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateNumericValue(mixed $value): void
    {
        if ($value !== null && $value !== '' && !is_numeric($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a numeric or null value.', static::class)
            );
        }
    }

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

    /**
     * Validate if the value is a string or null based on the type.
     *
     * @param mixed $value The value to validate.
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateStringValue(mixed $value): void
    {
        if ($value !== null && !is_string($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }
    }
}
