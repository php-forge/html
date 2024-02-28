<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\{Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement the toggle method.
 */
trait HasToggle
{
    protected string $toggle = '';

    /**
     * Set the content of the toggle button.
     *
     * @param RenderInterface|string ...$values The content of the toggle button.
     *
     * @return static A new instance of the current class with the specified toggle button content.
     */
    public function toggle(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->toggle = Sanitize::html(...$values);

        return $new;
    }
}
