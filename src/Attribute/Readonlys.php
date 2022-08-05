<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Readonlys
{
    /**
     * Returns a new instance with a boolean attribute which, if present, means this field cannot be edited by the user.
     *
     * Its value can, however, still be changed by JavaScript code directly setting the HTMLInputElement.value
     * property.
     *
     * @param bool $value The value of the readonly attribute, for default is false.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-readonly-attribute
     */
    public function readonly(bool $value = true): static
    {
        $new = clone $this;
        $new->attributes['readonly'] = $value;

        return $new;
    }
}
