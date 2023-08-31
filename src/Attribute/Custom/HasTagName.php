<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

/**
 * Is used by widgets that implement the tag name method.
 */
trait HasTagName
{
    /**
     * Set the tag name.
     *
     * @param string $value The tag name of the widget.
     *
     * @return static A new instance of the current class with the specified tag name.
     */
    public function tagName(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('Tag name cannot be empty.');
        }

        $new = clone $this;
        $new->tagName = $value;

        return $new;
    }
}
