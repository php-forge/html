<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\{Custom\HasDataCollapseToggle, HasData};
use PHPUnit\Framework\TestCase;

final class HasDataCollapseToggleTest extends TestCase
{
    public function testDataCollapseToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataCollapseToggle;

            public array $attributes = [];
        };

        $instance = $instance->dataCollapseToggle('value');

        $this->assertSame(['data-collapse-toggle' => 'value'], $instance->attributes);
    }
}
