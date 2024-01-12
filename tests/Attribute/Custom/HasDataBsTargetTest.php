<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataBsTarget;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataBsTargetTest extends TestCase
{
    public function testDataBsTarget(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsTarget;

            public array $attributes = [];
        };

        $instance = $instance->dataBsTarget('id');

        $this->assertSame(['data-bs-target' => 'id'], $instance->attributes);
    }

    public function testDataBsTargetWithTrue(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsTarget;

            public array $attributes = [];

            public function getDataBsTarget(): bool|string
            {
                return $this->dataBsTarget;
            }
        };

        $instance = $instance->dataBsTarget(true);

        $this->assertTrue($instance->getDataBsTarget());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsTarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataBsTarget(true));
    }
}
