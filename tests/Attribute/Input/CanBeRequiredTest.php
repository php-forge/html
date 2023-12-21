<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\CanBeRequired;
use PHPUnit\Framework\TestCase;

final class CanBeRequiredTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeRequired;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->required());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeRequired;

            protected array $attributes = [];

            public function getRequired(): bool
            {
                return $this->attributes['required'] ?? false;
            }
        };

        $this->assertFalse($instance->getRequired());
        $this->assertTrue($instance->required()->getRequired());
    }
}
