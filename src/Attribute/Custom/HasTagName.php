<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

/**
 * Is used by widgets that implement the tag name method.
 */
trait HasTagName
{
    protected string $tagName = '';

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
            throw new InvalidArgumentException(
                sprintf(
                    '%s::class widget must have a tag name.',
                    static::class
                )
            );
        }

        $new = clone $this;
        $new->tagName = $value;

        return $new;
    }
}
