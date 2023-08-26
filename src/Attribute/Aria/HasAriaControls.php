<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets that require the aria-controls attribute.
 */
trait HasAriaControls
{
    /**
     * Set the aria-controls attribute, which identifies the element(s) whose contents or presence are controlled
     * by the current element.
     *
     * The aria-controls attribute is used in WAI-ARIA to define a relationship between a controller element and
     * controlled elements, typically used for accessibility in web applications.
     *
     * @param string $value IDs of the controlled element(s) separated by spaces.
     *
     * @return static A new instance or clone of the current object with the aria-controls attribute set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-controls
     */
    public function ariaControls(string $value): static
    {
        $new = clone $this;
        $new->attributes['aria-controls'] = $value;

        return $new;
    }
}
