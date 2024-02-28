<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Contract;

use PHPForge\Html\Interop\RenderInterface;

/**
 * Provide methods for handling HTML content attributes.
 */
interface ContentInterface
{
    /**
     * Set the `HTML` content value.
     *
     * @param RenderInterface|string ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|RenderInterface ...$values): static;
}
