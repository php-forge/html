<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the formnovalidate method.
 */
trait HasFormnovalidate
{
    /**
     * Specifies that the element represents a control whose value is not meant to be validated during form submission.
     *
     * @return static A new instance of the current class with the specified formnovalidate value.
     */
    public function formnovalidate(): static
    {
        $new = clone $this;
        $new->attributes['formnovalidate'] = true;

        return $new;
    }
}
