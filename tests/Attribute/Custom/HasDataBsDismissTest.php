<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\{Attribute\Custom\HasDataBsDismiss, Attribute\HasData};
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

        $instance = $instance->dataBsDismiss('value');

        $this->assertSame(['data-bs-dismiss' => 'value'], $instance->attributes);
    }
}
