<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

/**
 * Is used by widgets which have a formaction attribute.
 */
trait HasFormaction
{
    /**
     * Returns a new instances specifies the form-submission action for the element.
     *
     * @param string $value The form-submission action.
     */
    public function formaction(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The formaction attribute must be empty.');
        }

        $new = clone $this;
        $new->attributes['formaction'] = $value;

        return $new;
    }
}
