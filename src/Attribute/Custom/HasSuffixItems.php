<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\{Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement the suffix item methods.
 */
trait HasSuffixItems
{
    protected string $suffixItems = '';

    /**
     * Set the `HTML` suffix items content.
     *
     * @param RenderInterface|string ...$values The `HTML` suffix item content.
     *
     * @return static A new instance of the current class with the specified suffix item content.
     */
    public function suffixItems(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->suffixItems = Sanitize::html(...$values);

        return $new;
    }
}
