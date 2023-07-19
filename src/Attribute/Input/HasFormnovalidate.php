<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which have a formnovalidate attribute.
 */
trait HasFormnovalidate
{
    /**
     * Returns a new instances specifies that the element represents a control whose value is not meant to be validated
     * during form submission.
     */
    public function formnovalidate(): static
    {
        $new = clone $this;
        $new->attributes['formnovalidate'] = true;

        return $new;
    }
}
