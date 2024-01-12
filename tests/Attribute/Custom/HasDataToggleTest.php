<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataToggle;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataToggleTest extends TestCase
{
    public function testDataDataToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataToggle;

            public array $attributes = [];
        };

        $instance = $instance->dataToggle('id');

        $this->assertSame(['data-toggle' => 'id'], $instance->attributes);
    }

    public function testDataDataToggleWithTrue(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataToggle;

            public array $attributes = [];

            public function getDataDrawerToggle(): bool|string
            {
                return $this->dataToggle;
            }
        };

        $instance = $instance->dataToggle(true);

        $this->assertTrue($instance->getDataDrawerToggle());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataToggle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataToggle(true));
    }
}
