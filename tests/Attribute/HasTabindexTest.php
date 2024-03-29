<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasTabindex;
use PHPUnit\Framework\TestCase;

final class HasTabindexTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTabindex;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->tabindex(0));
    }
}
