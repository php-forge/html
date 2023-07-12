<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Stringable;

/**
 * Provides methods to set prefix and suffix.
 */
trait HasPrefixAndSuffix
{
    protected string $prefix = '';
    protected string $suffix = '';

    /**
     * Return new instance specifying the `HTML` prefix content.
     *
     * @param string|Stringable $value The `HTML` prefix content.
     */
    public function prefix(string|Stringable $value): static
    {
        $new = clone $this;
        $new->prefix = (string) $value;

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix content.
     *
     * @param string|Stringable $value The `HTML` suffix content.
     */
    public function suffix(string|Stringable $value): static
    {
        $new = clone $this;
        $new->suffix = (string) $value;

        return $new;
    }
}
