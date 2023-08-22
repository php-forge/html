<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which have an aria-disabled attribute.
 */
trait HasAriaDisabled
{
    /**
     * The aria-disabled state indicates that the element is perceivable but disabled, so it is not editable or
     * otherwise operable.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-disabled
     */
    public function ariaDisabled(string $ariaDisabled): self
    {
        $new = clone $this;
        $new->attributes['aria-disabled'] = $ariaDisabled;

        return $new;
    }
}
