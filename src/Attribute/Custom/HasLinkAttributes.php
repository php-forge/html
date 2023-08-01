<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use function array_merge;

/**
 * Is used by widgets which have an link attributes property.
 */
trait HasLinkAttributes
{
    protected array $linkAttributes = [];

    /**
     * Returns a new instance specifying the `HTML` attributes for the link tag.
     *
     * @param array $values The `HTML` attributes for the link tag.
     */
    public function linkAttributes(array $values): static
    {
        $new = clone $this;
        $new->linkAttributes = array_merge($this->linkAttributes, $values);

        return $new;
    }
}
