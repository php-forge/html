<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the prompt method.
 */
trait HasPrompt
{
    protected string $prompt = '';
    protected string|null $promptValue = null;

    /**
     * Set the prompt option can be used to define a string that will be displayed on the first line of the drop-down
     * list widget.
     *
     * @param string $content The prompt content.
     * @param string|null $value The value for the prompt.
     *
     * @return static A new instance of the current class with the specified prompt option.
     */
    public function prompt(string $content, string $value = null): static
    {
        $new = clone $this;
        $new->prompt = $content;
        $new->promptValue = $value;

        return $new;
    }
}
