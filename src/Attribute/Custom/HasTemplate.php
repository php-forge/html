<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets which have a template value.
 */
trait HasTemplate
{
    /**
     * Returns a new instance specifying the template of the widget.
     *
     * @param string $value The template.
     */
    public function template(string $value): static
    {
        $new = clone $this;
        $new->template = $value;

        return $new;
    }
}
