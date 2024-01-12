<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement the tokenValue method.
 */
trait HasTokenValue
{
    protected array $tokenValue = [];

    public function tokenValue(string $token, string $value): static
    {
        $new = clone $this;
        $new->tokenValue[$token] = $value;

        return $new;
    }
}
