<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;

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
            if ($value instanceof WidgetInterface) {
                $value = $value->render();
            }

            $new->prefix .= Encode::cleanXSS($value);
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
            if ($value instanceof WidgetInterface) {
                $value = $value->render();
            }

            $new->suffix .= Encode::cleanXSS($value);
        }

        return $new;
    }
}
