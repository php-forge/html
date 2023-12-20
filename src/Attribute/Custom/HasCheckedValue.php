<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the check value method.
 */
trait HasCheckedValue
{
    protected mixed $checkedValue = null;

    /**
     * Set the value that determines when the checkbox should be checked.
     *
     * @param mixed $checkedValue The value that, when matched with the checkbox value, will mark the checkbox as checked.
     *
     * @return static Returns a new instance of the class with the updated checked value.
     */
    public function checkedValue(mixed $checkedValue): static
    {
        $new = clone $this;
        $new->checkedValue = $checkedValue;

        return $new;
    }
}
