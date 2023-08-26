<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the prefix and suffix methods.
 */
trait HasPrefixAndSuffix
{
    protected string $prefix = '';
    protected string $suffix = '';

    /**
     * Set the `HTML` prefix content.
     *
     * @param string|ElementInterface ...$values The `HTML` prefix content.
     *
     * @return static A new instance of the current class with the specified prefix content.
     */
    public function prefix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->prefix = Encode::create()->santizeXSS(...$values);

        return $new;
    }

    /**
     * Set the `HTML` suffix content.
     *
     * @param string|ElementInterface ...$values The `HTML` suffix content.
     *
     * @return static A new instance of the current class with the specified suffix content.
     */
    public function suffix(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->suffix = Encode::create()->santizeXSS(...$values);

        return $new;
    }
}
