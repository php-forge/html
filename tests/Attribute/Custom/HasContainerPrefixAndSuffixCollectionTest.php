<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContainerPrefixAndSuffixCollection;
use PHPUnit\Framework\TestCase;

final class HasContainerPrefixAndSuffixCollectionTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerPrefixAndSuffixCollection;
        };

        $this->assertNotSame($instance, $instance->containerPrefix(''));
        $this->assertNotSame($instance, $instance->containerSuffix(''));
    }
}
