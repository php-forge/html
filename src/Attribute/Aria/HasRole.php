<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Aria;

use function is_string;

/**
 * Is used by widgets which require a role attribute.
 */
trait HasRole
{
    protected bool|string $role = false;

    /**
     * Set the ARIA role for the element.
     *
     * ARIA roles provide semantic meaning to content, allowing screen readers and other tools to present and support
     * interaction with an object in a way that is consistent with user expectations of that type of object.
     *
     * @param bool|string $value The ARIA role value.
     *
     * @return static A new instance of the current class with the specified role attribute.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#role_definitions
     */
    public function role(bool|string $value): static
    {
        $new = clone $this;

        if ($value === true) {
            $new->role = true;
        } elseif (is_string($value)) {
            $new->attributes['role'] = $value;
        }

        return $new;
    }
}
