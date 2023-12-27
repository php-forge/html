<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the value method.
 */
trait HasValue
{
    /**
     * Get the value content attribute gives the default value of the field.
     *
     * @return mixed The value of the widget.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-value
     */
    public function getValue(): mixed
    {
        return $this->attributes['value'] ?? null;
    }

    /**
     * set the value content attribute gives the default value of the field.
     *
     * @param mixed $value The value of the widget.
     *
     * @return static A new instance of the current class with the specified value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-value
     */
     public function value(mixed $value): static
    {
        $new = clone $this;
        $new->attributes['value'] = $value;

        return $new;
    }
}
