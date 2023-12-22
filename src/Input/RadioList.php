<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * Generates a list of radio.
 */
final class RadioList extends Base\AbstractChoiceList
{
    protected function run(): string
    {
        return $this->renderChoiceItems('radio');
    }
}
