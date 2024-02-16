<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Contract;

/**
 * Provide methods for handling HTML checked value-related attributes and properties.
 */
interface CheckedInterface
{
    /**
     * Set the checked attribute valid for both radio and checkbox types, checked is a Boolean attribute.
     *
     * If present on a radio type, it indicates that the radio button is the currently selected one in the group of
     * same-named radio buttons. If present on a checkbox type, it indicates that the checkbox is checked by default
     * (when the page loads). It does not indicate whether this checkbox is currently checked: if the checkbox state
     * is changed, this content attribute does not reflect the change.
     *
     * @param array|bool|int|float|string $value The value of the checked attribute, for matching the value of the
     * checkbox or radio input element.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-checked
     *
     * @return static A new instance of the current class with the specified checked value.
     */
    public function checked(array|bool|int|float|null|string $value): static;
}
