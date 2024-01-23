<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasClosure;
use PHPUnit\Framework\TestCase;

final class HasClosureTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasClosure;
        };

        $this->assertNotSame($instance, $instance->closure(fn () => ''));
    }
}
