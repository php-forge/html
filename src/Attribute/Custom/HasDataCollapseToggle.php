<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataCollapseToggle method.
 */
trait HasDataCollapseToggle
{
    /**
     * Set the `HTML` data-collapse-toggle attribute for the toggle.
     *
     * @param string $value The data-collapse-toggle attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataCollapseToggle(string $value): static
    {
        return $this->dataAttributes([
            DataAttributes::COLLAPSE_TOGGLE => $value,
        ]);
    }
}
