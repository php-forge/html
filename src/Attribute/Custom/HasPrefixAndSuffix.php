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
     * @param string $value The `HTML` prefix content.
     */
    public function prefix(string $value): static
    {
        $new = clone $this;
        $new->prefix .= $new->prefix === '' ? Encode::content($value) : PHP_EOL . Encode::content($value);

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` prefix content of the widget tag.
     *
     * @param WidgetInterface $value The `HTML` prefix content of the widget tag.
     */
    public function prefixTag(WidgetInterface ...$value): static
    {
        $new = clone $this;

        foreach ($value as $widget) {
            $new->prefix .= $new->prefix === '' ? $widget->render() : PHP_EOL . $widget->render();
        }

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix content.
     *
     * @param string $value The `HTML` suffix content.
     */
    public function suffix(string$value): static
    {
        $new = clone $this;
        $new->suffix .= $new->suffix === '' ? Encode::content($value) : PHP_EOL . Encode::content($value);

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` suffix content of the widget tag.
     *
     * @param WidgetInterface $value The `HTML` suffix content of the widget tag.
     */
    public function suffixTag(WidgetInterface ...$value): static
    {
        $new = clone $this;

        foreach ($value as $widget) {
            $new->suffix .= $new->suffix === '' ? $widget->render() : PHP_EOL . $widget->render();
        }

        return $new;
    }
}
