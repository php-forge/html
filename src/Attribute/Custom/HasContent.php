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
     * @param string|WidgetInterface ...$values The content value.
     */
    public function content(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof WidgetInterface) {
                $value = $value->render();
            }

            /** @psalm-var string|string[] */
            $cleanContent = Encode::cleanXSS($value);
            $new->content .= is_array($cleanContent) ? implode('', $cleanContent) : $cleanContent;
        }

        return $new;
    }

    /**
     * Returns the content value of the widget.
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
