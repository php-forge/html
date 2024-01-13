<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasTokenValues;
use PHPUnit\Framework\TestCase;

final class HasTokenValuesTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTokenValues;
        };

        $this->assertNotSame($instance, $instance->tokenValues([]));
    }
}
