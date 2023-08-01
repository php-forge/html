<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;
use Stringable;

/**
 * Provides methods to set prefix and suffix items.
 */
trait HasPrefixAndSuffixItems
{
    protected string $prefixItems = '';
    protected string $suffixItems = '';

    /**
     * Return new instance specifying the `HTML` prefix items content.
     *
     * @param string|WidgetInterface ...$values The `HTML` prefix item content.
     */
    public function prefixItems(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->prefixItems .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix items content.
     */
    public function suffixItems(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->suffixItems .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }
}
