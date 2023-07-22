<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\CanBeChecked;
use PHPUnit\Framework\TestCase;

final class CanBeCheckedTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use CanBeChecked;
        };

        $this->assertNotSame($instance, $instance->checked(false));
    }

    public function testRender(): void
    {
        $instance = new class() {
            use CanBeChecked;

            protected array $attributes = [];

            public function getChecked(): bool
            {
                return $this->checked;
            }
        };

        $this->assertFalse($instance->checked(false)->getChecked());
        $this->assertTrue($instance->checked(true)->getChecked());
    }
}
