<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasMax;
use PHPUnit\Framework\TestCase;

final class HasMaxTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasMax;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->max(0));
    }
}
