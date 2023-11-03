<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasSeparator;
use PHPUnit\Framework\TestCase;

final class HasSeparatorTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasSeparator;
        };

        $this->assertNotSame($instance, $instance->separator('foo'));
    }
}
