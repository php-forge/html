<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\{Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement container prefix method.
 */
trait HasContainerPrefix
{
    protected string $containerPrefix = '';

    /**
     * Set the `HTML` container prefix content.
     *
     * @param RenderInterface|string ...$values The `HTML` container prefix content.
     *
     * @return static A new instance of the current class with the specified container prefix content.
     */
    public function containerPrefix(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->containerPrefix = Sanitize::html(...$values);

        return $new;
    }
}
