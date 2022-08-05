<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Size
{
    /**
     * Returns a new instance with the number of options meant to be shown by the control represented by its element.
     *
     * @param int $value The number of options meant to be shown by the control represented by its element.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-size
     */
    public function size(int $value): static
    {
        $new = clone $this;
        $new->attributes['size'] = $value;

        return $new;
    }
}
