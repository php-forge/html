<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataBsToggle method.
 */
trait HasDataBsToggle
{
    /**
     * Set the `HTML` data-bs-toggle attribute for the toggle.
     *
     * @param string $value The data-bs-toggle attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsToggle(string $value): static
    {
        return $this->dataAttributes([DataAttributes::BS_TOGGLE => $value]);
    }
}
