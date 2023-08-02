<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have a action property.
 */
trait HasAction
{
    protected string $action = '';

    /**
     * Returns a new instances with the action and form-action content attributes, if specified, must have a value that
     * is a valid non-empty URL surrounded by spaces.
     *
     * @param string $value The action attribute value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-action
     */
    public function action(string $value): static
    {
        $new = clone $this;
        $new->action = $value;

        return $new;
    }
}
