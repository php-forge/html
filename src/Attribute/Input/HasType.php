<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which have a type attribute.
 */
trait HasType
{
    /**
     * Returns a new instance specifying a string specifying the type of control to render.
     *
     * For example, to create a checkbox, a value of checkbox is used.
     *
     * If omitted (or an unknown value is specified), the input type text is used, creating a plaintext input field.
     *
     * @param mixed $value The type of control to render.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-type
     */
    public function type(mixed $value): static
    {
        $new = clone $this;
        $new->attributes['type'] = $value;

        return $new;
    }
}
