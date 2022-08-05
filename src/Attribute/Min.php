<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Min
{
    /**
     * Returns a new instance with the minimum value.
     *
     * @param int|string $value The minimum value.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-min
     */
    public function min(int|string $value): static
    {
        $new = clone $this;
        $new->attributes['min'] = $value;

        return $new;
    }
}
