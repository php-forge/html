<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataDropdownToggle method.
 */
trait HasDataDropdownToggle
{
    protected bool|string $dataDropdownToggle = false;

    /**
     * Set the `HTML` data dropdown toggle attribute for the toggle.
     *
     * @param bool|string $value The data-dropdown-toggle attribute value. If true, the value of the id attribute will
     * be used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataDropdownToggle(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([
                DataAttributes::DROPDOWN_TOGGLE => $value,
            ]);
        }

        $new = clone $this;
        $new->dataDropdownToggle = $value;

        return $new;
    }
}
