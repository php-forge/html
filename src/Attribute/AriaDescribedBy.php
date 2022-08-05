<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait AriaDescribedBy
{
    /**
     * Returns a new instance with identifies the element (or elements) that describes the element on which the
     * attribute is set.
     *
     * @param bool|string $value The value of the aria-describedby attribute.
     *
     * @return static
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-describedby
     */
    public function ariaDescribedBy(bool|string $value): static
    {
        $new = clone $this;
        $new->attributes['aria-describedby'] = $value;

        return $new;
    }
}
