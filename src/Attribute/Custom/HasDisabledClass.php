<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which have an disabled class property.
 */
trait HasDisabledClass
{
    protected string $disabledClass = 'disabled';

    /**
     * Returns a new instance specifying the `CSS` class to be appended to the disabled class.
     *
     * @param string $value The `CSS` class to be appended to the disabled class.
     */
    public function disabledClass(string $value): static
    {
        $new = clone $this;
        $new->disabledClass = $value;

        return $new;
    }
}
