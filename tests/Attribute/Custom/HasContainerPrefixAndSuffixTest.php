<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContainerPrefixAndSuffix;
use PHPUnit\Framework\TestCase;

final class HasContainerPrefixAndSuffixTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerPrefixAndSuffix;
        };

        $this->assertNotSame($instance, $instance->containerPrefix(''));
        $this->assertNotSame($instance, $instance->containerSuffix(''));
    }
}
