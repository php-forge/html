<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasCurrentPath;
use PHPUnit\Framework\TestCase;

final class HasCurrentPathTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasCurrentPath;
        };

        $this->assertNotSame($instance, $instance->currentPath(''));
    }
}
