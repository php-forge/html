<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the min method.
 */
trait HasMin
{
    /**
     * Set the min value valid for date, month, week, time, datetime-local, number, and range, it defines the smallest
     * value in the range of permitted values.
     *
     * If the value entered into the element is less than this, the element fails constraint validation.
     *
     * If the value of the min attribute isn't a number, then the element has no minimum value.
     *
     * @param int|string $value The minimum value.
     *
     * @return static A new instance of the current class with the specified minimum value.
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
