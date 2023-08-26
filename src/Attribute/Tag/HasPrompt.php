<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use PHPForge\Html\Tag;

/**
 * Is used by widgets that implement the prompt method.
 */
trait HasPrompt
{
    protected string $prompt = '';

    /**
     * Set the prompt option can be used to define a string that will be displayed on the first line of the drop-down
     * list widget.
     *
     * @param string $content The prompt content.
     * @param string $value The value for the prompt.
     *
     * @return static A new instance of the current class with the specified prompt value.
     */
    public function prompt(string $content, string $value = ''): static
    {
        $attributes = [];

        if ($value !== '') {
            $attributes['value'] = $value;
        }

        $new = clone $this;
        $new->prompt = Tag::widget()->attributes($attributes)->content($content)->tagName('option')->render();
        return $new;
    }
}
