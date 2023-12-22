<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\ChoiceList;

use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\ChoiceList;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    public function testImmutability(): void
    {
        $widget = ChoiceList::widget();

        $this->assertNotSame($widget, $widget->items(Checkbox::widget()));
    }
}
