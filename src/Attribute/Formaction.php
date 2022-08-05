<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use InvalidArgumentException;

trait Formaction
{
    /**
     * Returns a new instances specifies the form-submission action for the element.
     *
     * @param string $value The form-submission action.
     *
     * @return static
     */
    public function formaction(string $value): static
    {
        if ('' === $value) {
            throw new InvalidArgumentException('The formaction attribute must be empty.');
        }

        $new = clone $this;
        $new->attributes['formaction'] = $value;

        return $new;
    }
}
