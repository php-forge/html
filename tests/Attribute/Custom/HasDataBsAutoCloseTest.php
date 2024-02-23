<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\{Attribute\Custom\HasDataBsAutoClose, Attribute\HasData};
use PHPUnit\Framework\TestCase;

final class HasDataBsAutoCloseTest extends TestCase
{
    public function testDataBsAutoClose(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsAutoClose;

            public array $attributes = [];
        };

        $instance = $instance->dataBsAutoClose('value');

        $this->assertSame(['data-bs-auto-close' => 'value'], $instance->attributes);
    }
}
