<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * The input element with a type attribute whose value is "time" represents a control for setting the element’s value to
 * a string representing a time (with no timezone information).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.time.html#input.time
 */
final class Time extends Base\AbstractControl
{
    protected string $type = 'time';
}
