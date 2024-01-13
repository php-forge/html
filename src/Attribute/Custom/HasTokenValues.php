<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the tokenValues method.
 */
trait HasTokenValues
{
    protected array $tokenValues = [];

    /**
     * Set the token value.
     *
     * @param array $values Token values indexed by token names.
     *
     * @return static A new instance of the current class with the specified token value.
     */
    public function tokenValues(array $values): static
    {
        $new = clone $this;
        $new->tokenValues = $values;

        return $new;
    }
}
