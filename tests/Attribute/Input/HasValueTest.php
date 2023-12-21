<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasValue;
use PHPUnit\Framework\TestCase;

final class HasValueTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasValue;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->value(null));
    }
}
