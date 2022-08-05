<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Value
{
    /**
     * Returns a new instance with the specified the value content attribute gives the default value of the field.
     *
     * @param mixed $value The value of the widget.
     *
     * @return static
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
