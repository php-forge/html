<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

/**
 * Is used by widgets which implement the validate in list method.
 */
trait HasValidateInList
{
    /**
     * Validate if the value is in a valid list.
     *
     * @param string $value The value to validate.
     * @param string $exceptionMessage The exception message to throw.
     * @param string ...$compare The values in the list to compare.
     *
     * @throws InvalidArgumentException If the value is not in the list.
     */
    private function validateInList(string $value, string $exceptionMessage = '', string ...$compare): void
    {
        if ($value === '') {
            throw new InvalidArgumentException(
                sprintf('The value must not be empty. The valid values are: "%s".', implode('", "', $compare))
            );
        }

        if (in_array($value, $compare, true) === false) {
            throw new InvalidArgumentException(sprintf($exceptionMessage, $value, implode('", "', $compare)));
        }
    }
}
