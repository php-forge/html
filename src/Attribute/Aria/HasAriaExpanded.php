<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which have an aria-expanded attribute.
 */
trait HasAriaExpanded
{
    /**
     * The aria-expanded attribute is set on an element to indicate if a control is expanded or collapsed, and whether
     * or not the controlled elements are displayed or hidden.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-expanded
     */
    public function ariaExpanded(string $ariaExpanded): static
    {
        $new = clone $this;
        $new->attributes['aria-expanded'] = $ariaExpanded;

        return $new;
    }
}
