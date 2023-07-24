<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;
use Stringable;

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
            if ($value instanceof Stringable) {
                $value = $value->__toString();
            }

            $new->content .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }
}
