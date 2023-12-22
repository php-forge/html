<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * The input element with a type attribute whose value is "datetime" represents a control for setting the element’s
 * value to a string representing a global date and time (with timezone information).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.datetime.html#input.datetime
 */
final class Datetime extends Base\AbstractControl
{
    protected string $type = 'datetime';
}
