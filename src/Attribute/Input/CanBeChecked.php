<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is an attribute that can be used by widgets that can be checked.
 */
trait CanBeChecked
{
    protected bool $checked = false;

    /**
     * Returns a new instance specifying the boolean checked attribute valid for both radio and checkbox types, checked
     * is a Boolean attribute.
     *
     * If present on a radio type, it indicates that the radio button is the currently selected one in the group of
     * same-named radio buttons. If present on a checkbox type, it indicates that the checkbox is checked by default
     * (when the page loads). It does not indicate whether this checkbox is currently checked: if the checkbox's state
     * is changed, this content attribute does not reflect the change.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-checked
     */
    public function checked(): static
    {
        $new = clone $this;
        $new->checked = true;

        return $new;
    }
}
