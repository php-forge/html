<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataBsAutoClose method.
 */
trait HasDataBsAutoClose
{
    /**
     * Set the `HTML` data-bs-auto-close attribute for the toggle.
     *
     * @param string $value The data-bs-auto-close attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsAutoClose(string $value): static
    {
        return $this->dataAttributes([DataAttributes::BS_AUTO_CLOSE => $value]);
    }
}
