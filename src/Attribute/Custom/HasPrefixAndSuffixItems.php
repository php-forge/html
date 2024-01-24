<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the prefix and suffix item methods.
 */
trait HasPrefixAndSuffixItems
{
    protected string $prefixItems = '';
    protected string $suffixItems = '';

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
