<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Contract;

/**
 * Provide methods for handling HTML input placeholder attribute.
 */
interface PlaceholderInterface
{
    /**
     * Set the placeholder attribute valid for text, search, url, tel, email, password, and number, provides a brief
     * hint to the user as to what kind of information is expected in the field.
     *
     * It should be a word or short phrase that provides a hint as to the expected type of data, rather than an
     * explanation or prompt.
     *
     * The text must not include carriage returns or line feeds.
     *
     * @param string $value The placeholder text.
     *
     * @return static A new instance of the current class with the specified placeholder text.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-placeholder-attribute
     */
    public function placeholder(string $value): static;
}
