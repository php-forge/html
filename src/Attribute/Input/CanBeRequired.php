<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which can be required.
 */
trait CanBeRequired
{
    /**
     * Returns a new instance specifying required attribute which, if present, indicates that the user must specify a
     * value for the input before the owning form can be submitted.
     *
     * The required attribute is supported by text, search, url, tel, email, date, month, week, time, datetime-local,
     * number, password, checkbox, radio, and file inputs.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#the-required-attribute
     */
    public function required(): static
    {
        $new = clone $this;
        $new->attributes['required'] = true;

        return $new;
    }
}
