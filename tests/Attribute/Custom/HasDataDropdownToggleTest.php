<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataDropdownToggle;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataDropdownToggleTest extends TestCase
{
    public function testDataDropdownToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDropdownToggle;

            public array $attributes = [];
        };

        $instance = $instance->dataDropdownToggle('id');

        $this->assertSame([
            'data-dropdown-toggle' => 'id',
        ], $instance->attributes);
    }

    public function testDataDropdownToggleWithTrue(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDropdownToggle;

            public array $attributes = [];

            public function getDataDropdownToggle(): bool|string
            {
                return $this->dataDropdownToggle;
            }
        };

        $instance = $instance->dataDropdownToggle(true);

        $this->assertTrue($instance->getDataDropdownToggle());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDropdownToggle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataDropdownToggle(true));
    }
}
