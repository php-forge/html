<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * The input element with a type attribute whose value is "checkbox" represents a state or option that can be toggled.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox
 */
final class Checkbox extends Base\AbstractChoice
{
    protected string $type = 'checkbox';
}
