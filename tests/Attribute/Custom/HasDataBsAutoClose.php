<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataBsAutoClose;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataBsAutoClose extends TestCase
{
    public function testDataBsAutoClose(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsAutoClose;

            public array $attributes = [];
        };

        $instance = $instance->dataBsAutoClose('true');

        $this->assertSame(['data-bs-auto-close' => 'true'], $instance->attributes);
    }
}
