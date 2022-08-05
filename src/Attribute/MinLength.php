<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait MinLength
{
    /**
     * Returns a new instance with the minimum number of characters (as UTF-16 code units) the user can enter into the
     * text input.
     *
     * This must be a non-negative integer value smaller than or equal to the value specified by maxlength.
     *
     * If no minlength is specified, or an invalid value is specified, the text input has no minimum length.
     *
     * @param int $value The minimum number of characters (as UTF-16 code units) the user can enter into the text input.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-minlength
     */
    public function minlength(int $value): static
    {
        $new = clone $this;
        $new->attributes['minlength'] = $value;

        return $new;
    }
}
