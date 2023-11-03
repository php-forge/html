<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasMenu;
use PHPUnit\Framework\TestCase;

final class HasMenuTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasMenu;

            public function getMenuClass(): string
            {
                return $this->menuAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getMenuClass());

        $instance = $instance->menuClass('foo');

        $this->assertSame('foo', $instance->getMenuClass());

        $instance = $instance->menuClass('bar');

        $this->assertSame('foo bar', $instance->getMenuClass());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasMenu;
        };

        $this->assertNotSame($instance, $instance->menu(''));
        $this->assertNotSame($instance, $instance->menuAttributes([]));
        $this->assertNotSame($instance, $instance->menuClass(''));
    }
}
