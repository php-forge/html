<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasData;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataAttributes(DataAttributes::ACTION, ''));
    }
}
