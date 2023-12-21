<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\CanBeMultiple;
use PHPUnit\Framework\TestCase;

final class CanBeMultipleTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeMultiple;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->multiple());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeMultiple;

            protected array $attributes = [];

            public function getMultiple(): bool
            {
                return $this->attributes['multiple'] ?? false;
            }
        };

        $this->assertFalse($instance->getMultiple());
        $this->assertTrue($instance->multiple()->getMultiple());
    }
}
