<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets that require the aria-disabled attribute.
 */
trait HasAriaDisabled
{
    /**
     * Set the aria-disabled attribute, indicating whether the element is perceivable but disabled for interaction.
     *
     * The aria-disabled attribute is used in WAI-ARIA to convey that an element is not currently operable or editable,
     * typically to users of assistive technologies.
     *
     * @param string $value The value for the aria-disabled attribute ("true" or "false").
     *
     * @return static A new instance or clone of the current object with the aria-disabled attribute set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-disabled
     */
    public function ariaDisabled(string $value): static
    {
        $new = clone $this;
        $new->attributes['aria-disabled'] = $value;

        return $new;
    }
}
