<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Disabled
{
    /**
     * Returns a new instance with the specified the disabled state.
     *
     * If this attribute is set to `true`, the element is disabled. Disabled elements are usually drawn with grayed-out
     * text.
     *
     * If the element is disabled, it does not respond to user actions, it cannot be focused, and the command event
     * will not fire. In the case of form elements, it will not be submitted. Do not set the attribute to true, as
     * this will suggest you can set it to `false` to enable the element again, which is not the case.
     *
     * @return static
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
