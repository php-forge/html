<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Checked
{
    private bool $checked = false;

    /**
     * Returns a new instance with specifies that the element represents a selected control.
     *
     * @param bool $value The value of the checked attribute.
     *
     * @return static
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.radio.html#input.radio.attrs.checked
     */
    public function checked(bool $value): static
    {
        $new = clone $this;
        $new->checked = $value;

        return $new;
    }
}
