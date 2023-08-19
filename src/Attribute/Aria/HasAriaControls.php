<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which have an aria-controls attribute.
 */
trait HasAriaControls
{
    /**
     * The global aria-controls property identifies the element (or elements) whose contents or presence are controlled
     * by the element on which this attribute is set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-controls
     */
    public function ariaControls(string $ariaControls): self
    {
        $new = clone $this;
        $new->attributes['aria-controls'] = $ariaControls;

        return $new;
    }
}
