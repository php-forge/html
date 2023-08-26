<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets that require the aria-expanded attribute.
 */
trait HasAriaExpanded
{
    /**
     * Set the aria-expanded attribute, indicating whether the element is currently expanded or collapsed.
     *
     * The aria-expanded attribute is used in WAI-ARIA to convey the current expansion state of collapsible elements,
     * typically to users of assistive technologies.
     *
     * @param string $value The value for the aria-expanded attribute ("true" or "false").
     *
     * @return static A new instance or clone of the current object with the aria-expanded attribute set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-expanded
     */
    public function ariaExpanded(string $value): static
    {
        $new = clone $this;
        $new->attributes['aria-expanded'] = $value;

        return $new;
    }
}
