<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the checked method.
 */
trait CanBeChecked
{
    protected bool $checked = false;

    /**
     * Set the checked attribute valid for both radio and checkbox types, checked is a Boolean attribute.
     *
     * If present on a radio type, it indicates that the radio button is the currently selected one in the group of
     * same-named radio buttons. If present on a checkbox type, it indicates that the checkbox is checked by default
     * (when the page loads). It does not indicate whether this checkbox is currently checked: if the checkbox state
     * is changed, this content attribute does not reflect the change.
     *
     * @param bool $value The value of the checked attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-checked
     *
     * @return static A new instance of the current class with the specified checked value.
     */
    public function checked(bool $value): static
    {
        $new = clone $this;
        $new->checked = $value;

        return $new;
    }
}
