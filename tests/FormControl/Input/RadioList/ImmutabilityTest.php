<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\RadioList;

use PHPForge\Html\FormControl\Input\{Radio, RadioList};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    public function testImmutability(): void
    {
        $widget = RadioList::widget();

        $this->assertNotSame($widget, $widget->items(Radio::widget()));
    }
}
