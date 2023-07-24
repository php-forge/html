<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;

/**
 * Is used by widgets which have content value.
 */
trait HasContent
{
    protected string $content = '';

    /**
     * Returns a new instance specifying the content value of the widget.
     *
     * @param string $value The content value.
     */
    public function content(string $value): static
    {
        $new = clone $this;
        $new->content .= $new->content === '' ? Encode::content($value) : PHP_EOL . Encode::content($value);

        return $new;
    }

    /**
     * Returns a new instance specifying the content value of the widget tag.
     *
     * @param WidgetInterface $value The content value of the widget tag.
     */
    public function contentTag(WidgetInterface ...$value): static
    {
        $new = clone $this;

        foreach ($value as $widget) {
            $new->content .= $new->content === '' ? $widget->render() : PHP_EOL . $widget->render();
        }

        return $new;
    }
}
