<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the prefix item methods.
 */
trait HasPrefixItems
{
    protected string $prefixItems = '';

    /**
     * Set the `HTML` prefix items content.
     *
     * @param ElementInterface|string ...$values The `HTML` prefix item content.
     *
     * @return static A new instance of the current class with the specified prefix item content.
     */
    public function prefixItems(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->prefixItems = Encode::sanitizeXSS(...$values);

        return $new;
    }
}
