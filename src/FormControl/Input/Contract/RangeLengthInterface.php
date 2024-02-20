<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Contract;

/**
 * Provide methods for managing HTML validation-related attributes for max and min lengths.
 */
interface RangeLengthInterface
{
    /**
     * Set the max value valid for date, month, week, time, datetime-local, number, and range, it defines the greatest
     * value in the range of permitted values.
     *
     * If the value entered into the element exceeds this, the element fails constraint validation.
     *
     * If the value of the max attribute isn't a number, then the element has no maximum value.
     *
     * @param int|string $value The maximum value.
     *
     * @return static A new instance of the current class with the specified maximum value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-max
     */
    public function max(int|string $value): static;

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
    public function min(int|string $value): static;
}
