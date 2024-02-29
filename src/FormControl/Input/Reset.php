<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\Helper\Utils;

/**
 * The input element with a type attribute whose value is "reset" represents a button for resetting a form.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.reset.html#input.reset
 */
final class Reset extends Base\AbstractButton
{
    protected string $type = 'reset';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        $defaultDefinitions = parent::loadDefaultDefinitions();
        $defaultDefinitions['id()'] = [Utils::generateId('reset-')];

        return $defaultDefinitions;
    }
}
