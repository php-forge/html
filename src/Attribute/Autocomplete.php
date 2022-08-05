<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use InvalidArgumentException;

trait Autocomplete
{
    /**
     * Returns a new instance specifies whether the element represents an input control for which a UA is meant to store
     * the value entered by the user (so that the UA can prefill the form later).
     *
     * @param bool $autocomplete Whether the element represents an input control for which a UA is meant to store
     * the value entered by the user (so that the UA can prefill the form later).
     *
     * @return static
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
