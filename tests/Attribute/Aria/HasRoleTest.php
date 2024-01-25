<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasRole;
use PHPUnit\Framework\TestCase;

final class HasRoleTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasRole;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->role(''));
    }
}
