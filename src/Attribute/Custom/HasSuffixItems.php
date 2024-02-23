<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the suffix item methods.
 */
trait HasSuffixItems
{
    protected string $suffixItems = '';

    /**
     * Set the `HTML` suffix items content.
     *
     * @param ElementInterface|string ...$values The `HTML` suffix item content.
     *
     * @return static A new instance of the current class with the specified suffix item content.
     */
    public function suffixItems(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->suffixItems = Encode::sanitizeXSS(...$values);

        return $new;
    }
}
