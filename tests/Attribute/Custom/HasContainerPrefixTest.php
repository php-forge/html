<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContainerPrefix;
use PHPUnit\Framework\TestCase;

final class HasContainerPrefixTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerPrefix;
        };

        $this->assertNotSame($instance, $instance->containerPrefix(''));
    }
}
