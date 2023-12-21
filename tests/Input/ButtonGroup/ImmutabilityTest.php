<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\ButtonGroup;

use PHPForge\Html\Input\Button;
use PHPForge\Html\Input\ButtonGroup;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    public function testImmutability(): void
    {
        $widget = ButtonGroup::widget();

        $this->assertNotSame($widget, $widget->buttons(Button::widget()));
        $this->assertNotSame($widget, $widget->individualContainer(false));
    }
}
