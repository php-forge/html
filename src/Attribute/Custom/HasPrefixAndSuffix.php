<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
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
     * @param bool $encode Whether to encode the value.
     */
    public function prefix(string|Stringable $value, bool $encode = true): static
    {
        if (!$value instanceof Stringable && $encode) {
            $value = Encode::content($value);
        }

        $new = clone $this;
        $new->prefix = (string) $value;

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix content.
     *
     * @param string|Stringable $value The `HTML` suffix content.
     * @param bool $encode Whether to encode the value.
     */
    public function suffix(string|Stringable $value, bool $encode = true): static
    {
        if (!$value instanceof Stringable && $encode) {
            $value = Encode::content($value);
        }

        $new = clone $this;
        $new->suffix = (string) $value;

        return $new;
    }
}
