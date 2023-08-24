<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

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
     * @param string|ElementInterface ...$values The `HTML` prefix content.
     */
    public function prefix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->prefix = Encode::create()->santizeXSS(...$values);

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix content.
     */
    public function suffix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->suffix = Encode::create()->santizeXSS(...$values);

        return $new;
    }
}
