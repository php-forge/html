<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Sanitizer;
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
     * @param string|Stringable $value The content value.
     */
    public function content(string|Stringable $value): static
    {
        if (!$value instanceof Stringable) {
            $value = Sanitizer::clean($value);
        }

        $new = clone $this;
        $new->content = (string) $value;

        return $new;
    }
}
