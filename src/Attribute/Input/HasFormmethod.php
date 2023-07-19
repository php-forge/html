<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

/**
 * Is used by widgets which have a formmethod attribute.
 */
trait HasFormmethod
{
    /**
     * Returns a new instances specifies the HTTP method with which a UA is meant to associate this element for form
     * submission.
     *
     * @param string $value The HTTP method.
     */
    public function formmethod(string $value): static
    {
        if ($value !== 'get' && $value !== 'post') {
            throw new InvalidArgumentException('The formnMethod attribute must be either "get" or "post".');
        }

        $new = clone $this;
        $new->attributes['formn-method'] = $value;

        return $new;
    }
}
