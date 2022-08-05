<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use InvalidArgumentException;

trait Formenctype
{
    /**
     * Returns a new instances specifies a mime type with which a UA is meant to associate this element for form
     * submission.
     *
     * @param string $value The mime type.
     *
     * @return static
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
