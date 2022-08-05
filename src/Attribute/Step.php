<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use InvalidArgumentException;

trait Step
{
    /**
     * Returns a new instances specifying the value granularity of the element’s value.
     *
     * @param float|int|string $value The value granularity of the element’s value.
     *
     * @return static
     */
    public function step(int|float|string $value): static
    {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('The value must be a number.');
        }

        $new = clone $this;
        $new->attributes['step'] = $value;

        return $new;
    }
}
