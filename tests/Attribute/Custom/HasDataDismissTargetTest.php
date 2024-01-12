<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataDismissTarget;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataDismissTargetTest extends TestCase
{
    public function testDataDismissTarget(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDismissTarget;

            public array $attributes = [];
        };

        $instance = $instance->dataDismissTarget('id');

        $this->assertSame(['data-dismiss-target' => 'id'], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDismissTarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataDismissTarget(true));
    }
}
