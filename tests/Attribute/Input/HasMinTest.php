<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasMin;
use PHPUnit\Framework\TestCase;

final class HasMinTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMin;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->min(0));
    }
}
