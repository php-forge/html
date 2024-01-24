<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the content method.
 */
trait HasContent
{
    protected string $content = '';

    /**
     * Set the `HTML` content value.
     *
     * @param ElementInterface|string ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->content = Encode::sanitizeXSS(...$values);

        return $new;
    }

    /**
     * Get the `HTML` content value.
     *
     * @return string The `HTML` content value.
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
