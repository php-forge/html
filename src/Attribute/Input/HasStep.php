<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

use function is_numeric;

/**
 * Is used by widgets that implement the step method.
 */
trait HasStep
{
    /**
     * Set the step attribute valid for date, month, week, time, datetime-local, number, and range, the step attribute
     * is a number that specifies the granularity that the value must adhere to.
     *
     * @param int|string $value The value granularity of the element’s value.
     *
     * @return static A new instance of the current class with the specified step value.
     *
     * @throws InvalidArgumentException If the value is not numeric.
     */
    public function step(int|string $value): static
    {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('The value must be a number.');
        }

        $new = clone $this;
        $new->attributes['step'] = $value;

        return $new;
    }
}
