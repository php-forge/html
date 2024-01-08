<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Contract;

/**
 * Provide methods for handling HTML validation-related required attributes.
 */
interface RequiredInterface
{
    /**
     * Set the required attribute which, if present, indicates that the user must specify a value for the input before
     * the owning form can be submitted.
     *
     * The required attribute is supported by text, search, url, tel, email, date, month, week, time, datetime-local,
     * number, password, checkbox, radio, and file inputs.
     *
     * @return static A new instance of the current class with the specified required value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#the-required-attribute
     */
    public function required(): static;
}
