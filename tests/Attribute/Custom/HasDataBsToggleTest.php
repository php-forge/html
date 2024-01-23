<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataBsToggle;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataBsToggleTest extends TestCase
{
    public function testDataBsToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsToggle;

            public array $attributes = [];
        };

        $instance = $instance->dataBsToggle('collapse');

        $this->assertSame([
            'data-bs-toggle' => 'collapse',
        ], $instance->attributes);
    }
}
