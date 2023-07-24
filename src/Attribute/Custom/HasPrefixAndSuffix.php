<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;
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
     * @param string|WidgetInterface ...$values The `HTML` prefix content.
     */
    public function prefix(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->prefix .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix content.
     */
    public function suffix(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->suffix .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }
}
