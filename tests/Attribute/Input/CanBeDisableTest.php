<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\CanBeDisabled;
use PHPUnit\Framework\TestCase;

final class CanBeDisableTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use CanBeDisabled;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->disabled());
    }

    public function testRender(): void
    {
        $instance = new class() {
            use CanBeDisabled;

            protected array $attributes = [];

            public function getDisabled(): bool
            {
                return $this->attributes['disabled'] ?? false;
            }
        };

        $this->assertFalse($instance->getDisabled());
        $this->assertTrue($instance->disabled()->getDisabled());
    }
}
