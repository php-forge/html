<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasType;
use PHPUnit\Framework\TestCase;

final class HasTypeTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasType;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->type(''));
    }
}
