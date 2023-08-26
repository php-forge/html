<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the disabled method.
 */
trait CanBeDisabled
{
    /**
     * Set the disabled attribute.
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
     * @return static A new instance of the current class with the specified disabled value.
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
