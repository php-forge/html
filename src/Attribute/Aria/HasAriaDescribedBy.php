<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which have an aria-describedby attribute.
 */
trait HasAriaDescribedBy
{
    /**
     * Returns a new instance specifying the element (or elements) that describes the element on which the attribute is
     * set.
     *
     * @param string $value The value of the aria-describedby attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-describedby
     */
    public function ariaDescribedBy(string $value): static
    {
        $new = clone $this;
        $new->attributes['aria-describedby'] = $value;

        return $new;
    }
}
