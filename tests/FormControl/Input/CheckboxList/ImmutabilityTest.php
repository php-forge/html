<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\CheckboxList;

use PHPForge\Html\FormControl\Input\{Checkbox, CheckboxList};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    public function testImmutability(): void
    {
        $widget = CheckboxList::widget();

        $this->assertNotSame($widget, $widget->items(Checkbox::widget()));
    }
}
