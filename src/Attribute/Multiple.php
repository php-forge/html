<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Multiple
{
    /**
     * Returns a new instances specifying the element allows multiple values.
     *
     * @param bool $value Whether the element allows multiple values.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-multiple
     */
    public function multiple(bool $value = true): static
    {
        $new = clone $this;
        $new->attributes['multiple'] = $value;

        return $new;
    }
}
