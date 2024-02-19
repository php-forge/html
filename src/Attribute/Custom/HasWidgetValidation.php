<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

use function implode;
use function in_array;
use function is_iterable;
use function is_numeric;
use function is_scalar;
use function is_string;
use function sprintf;

/**
 * Is used by widgets which implement the validation method.
 */
trait HasWidgetValidation
{
    /**
     * Validate if the value is an iterable or null based on the type.
     *
     * @param mixed $value The value to validate.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    protected function validateIterable(mixed $value): void
    {
        if (!is_iterable($value) && $value !== null) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be an iterable or null value.', static::class)
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
    protected function validateScalar(mixed ...$values): void
    {
        foreach ($values as $value) {
            if (is_scalar($value) === false && $value !== null) {
                throw new InvalidArgumentException(sprintf('%s::class widget must be a scalar value.', static::class));
            }
        }
    }

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

    /**
     * Validate if the value is valid tag name.
     *
     * @param string $tagName The tag name to validate.
     * @param string ...$compare The tag names to compare.
     *
     * @throws InvalidArgumentException If the value is invalid.
     */
    private function validateTagName(string $tagName, string ...$compare): void
    {
        $this->validateInList($tagName, '%s::class widget must have a tag name of %s.', ...$compare);
    }

    /**
     * Validate if the value is in a valid list.
     *
     * @param string $value The value to validate.
     * @param string $exceptionMessage The exception message to throw.
     * @param string ...$compare The values in the list to compare.
     *
     * @throws InvalidArgumentException If the value is not in the list.
     */
    private function validateInList(string $value, string $exceptionMessage, string ...$compare): void
    {
        if (in_array($value, $compare, true) === false) {
            throw new InvalidArgumentException(sprintf($exceptionMessage, static::class, implode(', ', $compare)));
        }
    }
}
