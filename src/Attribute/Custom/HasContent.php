<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets which have content value.
 */
trait HasContent
{
    protected string $content = '';

    /**
     * Returns a new instance specifying the content value of the widget.
     *
     * @param string|ElementInterface ...$values The content value.
     */
    public function content(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->content = Encode::create()->santizeXSS(...$values);

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
