<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Placeholder
{
    /**
     * Returns a new instances specifying the placeholder attribute.
     *
     * @param string $value The placeholder text.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-placeholder-attribute
     */
    public function placeholder(string $value): static
    {
        $new = clone $this;
        $new->attributes['placeholder'] = $value;

        return $new;
    }
}
