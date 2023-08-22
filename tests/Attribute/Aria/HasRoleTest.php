<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasRole;
use PHPUnit\Framework\TestCase;

final class HasRoleTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasRole;
        };

        $this->assertNotSame($instance, $instance->role(''));
    }
}
