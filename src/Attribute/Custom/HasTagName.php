<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;

/**
 * Is used by widgets which have a tag name, for example `div`, `span`, `a`, etc.
 */
trait HasTagName
{
    protected string $tagName = '';

    /**
     * Returns a new instance specifying the tag name of the widget.
     *
     * @param string $value The tag name of the widget.
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
