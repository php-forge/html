<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;
use function strtoupper;

/**
 * Is used by widgets that implement the formmethod method.
 */
trait HasFormmethod
{
    /**
     * Set the HTTP method with which a UA is meant to associate this element for form submission.
     *
     * @param string $value The HTTP method with which a UA is meant to associate this element for form submission.
     *
     * @return static A new instance of the current class with the specified formmethod value.
     *
     * @throws InvalidArgumentException If the provided formmethod value is not one of the following values:
     * "get", "post".
     */
    public function formmethod(string $value): static
    {
        $allowedMethods = ['GET', 'POST'];

        if (in_array(strtoupper($value), $allowedMethods, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The formmethod attribute must be one of the following values: "%s".',
                    implode('", "', $allowedMethods)
                )
            );
        }

        $new = clone $this;
        $new->attributes['formn-method'] = $value;

        return $new;
    }
}
