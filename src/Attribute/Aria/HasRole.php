<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which require an role attribute.
 */
trait HasRole
{
    /**
     * Set the ARIA role for the element.
     *
     * ARIA roles provide semantic meaning to content, allowing screen readers and other tools to present and support
     * interaction with an object in a way that is consistent with user expectations of that type of object.
     *
     * @return static A new instance of the current class with the specified role attribute.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#role_definitions
     */
    public function role(string $value): static
    {
        $new = clone $this;
        $new->attributes['role'] = $value;

        return $new;
    }
}
