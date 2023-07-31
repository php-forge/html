<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;
use Stringable;

/**
 * Provides methods to set prefix and suffix item.
 */
trait HasPrefixAndSuffixItem
{
    protected string $prefixItem = '';
    protected string $suffixItem = '';

    /**
     * Return new instance specifying the `HTML` prefix item content.
     *
     * @param string|WidgetInterface ...$values The `HTML` prefix item content.
     */
    public function prefixItem(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->prefixItem .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix item content.
     */
    public function suffixItem(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->suffixItem .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }
}
