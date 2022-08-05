<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Max
{
    /**
     * Returns a new instance with the maximum value.
     *
     * @param int|string $value The maximum value.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-max
     */
    public function max(int|string $value): static
    {
        $new = clone $this;
        $new->attributes['max'] = $value;

        return $new;
    }
}
