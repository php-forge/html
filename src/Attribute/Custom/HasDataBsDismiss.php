<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataBsDismiss method.
 */
trait HasDataBsDismiss
{
    /**
     * Set the `HTML` data-bs-dismiss attribute for the toggle.
     *
     * @param string $value The data-bs-dismiss attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsDismiss(string $value): static
    {
        return $this->dataAttributes([
            DataAttributes::BS_DISMISS => $value,
        ]);
    }
}
