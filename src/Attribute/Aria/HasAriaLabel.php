<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which require an aria-label attribute.
 */
trait HasAriaLabel
{
    /**
     * Set the aria-label attribute, is a string that labels the current interactive element.
     *
     * @param string $value The value of the aria-label attribute.
     *
     * @return static A new instance of the current class with the specified aria-label attribute.
     *
     * @link https://www.w3.org/TR/wai-aria/#aria-label
     */
    public function ariaLabel(string $value): static
    {
        $new = clone $this;
        $new->attributes['aria-label'] = $value;

        return $new;
    }
}
