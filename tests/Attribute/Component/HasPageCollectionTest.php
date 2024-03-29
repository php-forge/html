<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasPageCollection;
use PHPUnit\Framework\TestCase;

final class HasPageCollectionTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPageCollection;
        };

        $this->assertNotSame($instance, $instance->page(1));
        $this->assertNotSame($instance, $instance->pageName(''));
    }
}
