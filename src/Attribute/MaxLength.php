<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait MaxLength
{
    /**
     * Returns a new instance with the maxlength attribute defines the maximum number of characters
     * (as UTF-16 code units) the user can enter into a tag input.
     *
     * If no maxlength is specified, or an invalid value is specified, the tag input has no maximum length.
     *
     * @param int $value the maximum number of characters (as UTF-16 code units) the user can enter into a tag input.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-maxlength
     */
    public function maxlength(int $value): static
    {
        $new = clone $this;
        $new->attributes['maxlength'] = $value;

        return $new;
    }
}
