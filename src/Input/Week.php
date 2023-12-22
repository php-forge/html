<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * The input element with a type attribute whose value is "week" represents a control for setting the element’s value to
 * a string representing a week.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.week.html#input.week
 */
final class Week extends Base\AbstractControl
{
    protected string $type = 'week';
}
