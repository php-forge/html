<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets which have an autofocus attribute.
 */
trait CanBeAutofocus
{
    /**
     * Returns a new instance specifying the focus on the control (put cursor into it) when the page loads.
     *
     * Only one form element could be in focus at the same time.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#autofocusing-a-form-control-the-autofocus-attribute
     */
    public function autofocus(): static
    {
        $new = clone $this;
        $new->attributes['autofocus'] = true;

        return $new;
    }
}
