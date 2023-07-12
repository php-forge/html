<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which can have a readonly attribute.
 */
trait CanBeReadonly
{
    /**
     * Returns a new instance specifying the boolean attribute which, if present, means this field cannot be edited by
     * the user.
     *
     * Its value can, however, still be changed by JavaScript code directly setting the HTMLInputElement.value
     * property.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-readonly-attribute
     */
    public function readonly(): static
    {
        $new = clone $this;
        $new->attributes['readonly'] = true;

        return $new;
    }
}
