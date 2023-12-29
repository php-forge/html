<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the toggle button method.
 */
trait HasToggleButton
{
    protected string $toggleButton = '';

    /**
     * Set the button toogle for the toggle.
     *
     * @param string|ElementInterface ...$values The button content.
     *
     * @return static A new instance of the current class with the specified toggle button.
     */
    public function toggleButton(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->toggleButton = Encode::santizeXSS(...$values);

        return $new;
    }
}
