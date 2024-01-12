<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasTokenValue;
use PHPUnit\Framework\TestCase;

final class HasTokenValueTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTokenValue;
        };

        $this->assertNotSame($instance, $instance->tokenValue('', ''));
    }
}
