<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the multiple method.
 */
trait CanBeMultiple
{
    /**
     * Set the multiple attribute, if set, means the user can enter comma separated email addresses in the email widget
     * or can choose more than one file with the file input.
     *
     * @return static A new instance of the current class with the specified multiple value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-multiple
     */
    public function multiple(): static
    {
        $new = clone $this;
        $new->attributes['multiple'] = true;

        return $new;
    }
}
