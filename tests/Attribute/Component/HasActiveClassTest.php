<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasActiveClass;
use PHPUnit\Framework\TestCase;

final class HasActiveClassTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasActiveClass;
        };

        $this->assertNotSame($instance, $instance->activeClass(''));
    }
}
