<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasActive;
use PHPUnit\Framework\TestCase;

final class HasActiveTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasActive;
        };

        $this->assertNotSame($instance, $instance->active());
    }

    public function testIsActive(): void
    {
        $instance = new class() {
            use HasActive;
        };

        $this->assertFalse($instance->isActive());
        $this->assertTrue($instance->active()->isActive());
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasActive;

            public function getActive(): bool
            {
                return $this->active;
            }
        };

        $this->assertFalse($instance->getActive());
        $this->assertTrue($instance->active()->getActive());
    }
}
