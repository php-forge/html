<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

/**
 * Is used by widgets that implement the formenctype method.
 */
trait HasFormenctype
{
    /**
     * Set a mime type with which a UA is meant to associate this element for form submission.
     *
     * @param string $value The mime type.
     *
     * @throws InvalidArgumentException If the provided formenctype value is not one of the following values:
     * "multipart/form-data", "application/x-www-form-urlencoded", "text/plain".
     *
     * @return static A new instance of the current class with the specified formenctype value.
     */
    public function formenctype(string $value): static
    {
        if (
            $value !== 'multipart/form-data' &&
            $value !== 'application/x-www-form-urlencoded' &&
            $value !== 'text/plain'
        ) {
            throw new InvalidArgumentException(
                'The formenctype attribute must be one of the following values: ' .
                '"multipart/form-data", "application/x-www-form-urlencoded", "text/plain".'
            );
        }

        $new = clone $this;
        $new->attributes['formenctype'] = $value;

        return $new;
    }
}
