<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\CanBeHidden;
use PHPUnit\Framework\TestCase;

final class CanBeHiddenTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use CanBeHidden;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->hidden());
    }

    public function testRender(): void
    {
        $instance = new class() {
            use CanBeHidden;

            protected array $attributes = [];

            public function getHidden(): bool
            {
                return $this->attributes['hidden'] ?? false;
            }
        };

        $this->assertFalse($instance->getHidden());
        $this->assertTrue($instance->hidden()->getHidden());
    }
}
