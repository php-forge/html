<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

/**
 * Is used by widgets which have an role attribute.
 */
trait HasRole
{
    /**
     * ARIA roles provide semantic meaning to content, allowing screen readers and other tools to present and support
     * interaction with an object in a way that is consistent with user expectations of that type of object.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#role_definitions
     */
    public function role(string $role): self
    {
        $new = clone $this;
        $new->attributes['role'] = $role;

        return $new;
    }
}
