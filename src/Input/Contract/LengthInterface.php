<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Contract;

/**
 * Provide methods for managing HTML validation-related attributes for maximum and minimum lengths.
 */
interface LengthInterface
{
    /**
     * Set the maxlength attribute defines the maximum number of characters (as UTF-16 code units) the user can enter
     * into a tag input.
     *
     * If no maxlength is specified, or an invalid value is specified, the tag input has no maximum length.
     *
     * @param int $value The maximum number of characters (as UTF-16 code units) the user can enter into a tag input.
     *
     * @return static A new instance of the current class with the specified maximum length.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-maxlength
     */
    public function maxLength(int $value): static;

    /**
     * Set the minimum number of characters (as UTF-16 code units) the user can enter into the text input.
     *
     * This must be a non-negative integer value smaller than or equal to the value specified by maxlength.
     *
     * If no minlength is specified, or an invalid value is specified, the text input has no minimum length.
     *
     * @param int $value The minimum number of characters (as UTF-16 code units) the user can enter into the text input.
     *
     * @return static A new instance of the current class with the specified minimum length.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-minlength
     */
    public function minLength(int $value): static;
}
