<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * The input element with a type attribute whose value is "radio" represents a selection of one item from a list of
 * items (a radio button).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.radio.html#input.radio
 */
final class Radio extends Base\AbstractInputChoice
{
    protected function run(): string
    {
        return $this->buildChoiceTag('radio');
    }
}
