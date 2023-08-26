<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

/**
 * Is used by widgets that implement the autocomplete method.
 */
trait HasAutocomplete
{
    /**
     * Represents an input control for which a UA is meant to store the value entered by the user
     * (so that the UA can prefill the form later).
     *
     * @param string $value The value of the autocomplete attribute.
     *
     * @return static A new instance of the current class with the specified autocomplete value.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-autocomplete
     */
    public function autocomplete(string $value): static
    {
        if ($value !== 'on' && $value !== 'off') {
            throw new InvalidArgumentException('Autocomplete must be "on" or "off".');
        }

        $new = clone $this;
        $new->attributes['autocomplete'] = $value;

        return $new;
    }
}
