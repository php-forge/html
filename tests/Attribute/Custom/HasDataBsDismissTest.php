<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataBsDismiss;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataBsDismissTest extends TestCase
{
    public function testDataBsDismiss(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsDismiss;

            public array $attributes = [];
        };

        $instance = $instance->dataBsDismiss('alert');

        $this->assertSame(['data-bs-dismiss' => 'alert'], $instance->attributes);
    }
}
