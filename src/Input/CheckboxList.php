<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/*
 * Generates a list of checkboxes.
 *
 * A checkbox list allows many selections.
 */
final class CheckboxList extends Base\AbstractChoiceList
{
    protected function run(): string
    {
        return $this->renderChoiceItems('checkbox');
    }
}
