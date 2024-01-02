<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the type method.
 */
trait HasType
{
    protected string $type = '';

    /**
     * Set the type of control to render.
     *
     * For example, to create a checkbox, a value of checkbox is used.
     *
     * If omitted (or an unknown value is specified), the input type text is used, creating a plaintext input field.
     *
     * @param string $value The type of control to render.
     *
     * @return static A new instance of the current class with the specified type.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-type
     */
    public function type(string $value): static
    {
        $new = clone $this;
        $new->type = $value;

        return $new;
    }
}
