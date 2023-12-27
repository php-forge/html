<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Input\Base\AbstractInputChoice;

/**
 * The input element with a type attribute whose value is "checkbox" represents a state or option that can be toggled.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox
 */
final class Checkbox extends AbstractInputChoice
{
    protected function run(): string
    {
        return $this->buildChoiceTag('checkbox');
    }
}
