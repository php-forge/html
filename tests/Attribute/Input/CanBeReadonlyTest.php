<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\CanBeReadonly;
use PHPUnit\Framework\TestCase;

final class CanBeReadonlyTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use CanBeReadonly;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->readonly());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeReadonly;

            protected array $attributes = [];

            public function getReadonly(): bool
            {
                return $this->attributes['readonly'] ?? false;
            }
        };

        $this->assertFalse($instance->getReadonly());
        $this->assertTrue($instance->readonly()->getReadonly());
    }
}
