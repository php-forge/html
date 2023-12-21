<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets that require the aria-describedby attribute.
 */
trait HasAriaDescribedBy
{
    /**
     * Set the aria-describedby attribute, which identifies the element(s) that describe the current element.
     *
     * The aria-describedby attribute is used in WAI-ARIA to provide a relationship between an element and its
     * descriptive elements. This helps screen readers and other assistive technologies provide additional context
     * about the element.
     *
     * @param string|bool $value IDs of the descriptive element(s) separated by spaces.
     *
     * @return static A new instance or clone of the current object with the aria-describedby attribute set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-describedby
     */
    public function ariaDescribedBy(string|bool $value = true): static
    {
        $new = clone $this;
        $new->attributes['aria-describedby'] = $value;

        return $new;
    }
}
