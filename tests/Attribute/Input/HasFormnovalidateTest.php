<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasFormnovalidate;
use PHPUnit\Framework\TestCase;

final class HasFormnovalidateTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormnovalidate;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formnovalidate());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasFormnovalidate;

            protected array $attributes = [];

            public function getFormnovalidate(): bool
            {
                return $this->attributes['formnovalidate'] ?? false;
            }
        };

        $this->assertFalse($instance->getFormnovalidate());
        $this->assertTrue($instance->formnovalidate()->getFormnovalidate());
    }
}
