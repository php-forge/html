<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which can be disabled.
 */
trait CanBeDisabled
{
    /**
     * Returns a new instance specifying the disabled attribute.
     *
     * If this attribute is set to `true`, the element is disabled.
     *
     * Disabled elements are usually drawn with grayed-out text.
     *
     * If the element is disabled, it does not respond to user actions, it cannot be focused, and the command event
     * will not fire.
     *
     * In the case of form elements, it will not be submitted.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-disabledformelements-disabled
     */
    public function disabled(): static
    {
        $new = clone $this;
        $new->attributes['disabled'] = true;

        return $new;
    }
}
