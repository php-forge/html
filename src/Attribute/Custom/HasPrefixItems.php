<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\{Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement the prefix item methods.
 */
trait HasPrefixItems
{
    protected string $prefixItems = '';

    /**
     * Set the `HTML` prefix items content.
     *
     * @param RenderInterface|string ...$values The `HTML` prefix item content.
     *
     * @return static A new instance of the current class with the specified prefix item content.
     */
    public function prefixItems(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->prefixItems = Sanitize::html(...$values);

        return $new;
    }
}
