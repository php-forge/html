<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Formnovalidate
{
    /**
     * Returns a new instances specifies that the element represents a control whose value is not meant to be validated
     * during form submission.
     *
     * @return static
     */
    public function formnovalidate(): static
    {
        $new = clone $this;
        $new->attributes['formnovalidate'] = true;

        return $new;
    }
}
