<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the action method.
 */
trait HasAction
{
    protected string $action = '';

    /**
     * Set the action and form-action content attributes, if specified, must have a value that is a valid non-empty URL
     * surrounded by spaces.
     *
     * @param string $value The action attribute value.
     *
     * @return static A new instance of the current class with the specified action value.
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
