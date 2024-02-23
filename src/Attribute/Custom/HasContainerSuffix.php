<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\{Html\Helper\Encode, Widget\ElementInterface};

/**
 * Is used by widgets that implement container suffix method.
 */
trait HasContainerSuffix
{
    protected string $containerSuffix = '';

    /**
     * Set the `HTML` container suffix content.
     *
     * @param ElementInterface|string ...$values The `HTML` container suffix content.
     *
     * @return static A new instance of the current class with the specified container suffix content.
     */
    public function containerSuffix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->containerSuffix = Encode::sanitizeXSS(...$values);

        return $new;
    }
}
