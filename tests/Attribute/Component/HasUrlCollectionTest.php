<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasUrl;
use PHPForge\Html\Attribute\Component\HasUrlCollection;
use PHPUnit\Framework\TestCase;

final class HasUrlCollectionTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasUrlCollection;
        };

        $this->assertNotSame($instance, $instance->urlCreator(fn() => ''));
        $this->assertNotSame($instance, $instance->urlQueryParameters([]));
        $this->assertNotSame($instance, $instance->urlPath(''));
    }
}
