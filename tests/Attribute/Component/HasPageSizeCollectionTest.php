<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasPageSizeCollection;
use PHPUnit\Framework\TestCase;

final class HasPageSizeCollectionTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPageSizeCollection;
        };

        $this->assertNotSame($instance, $instance->pageSize(0));
        $this->assertNotSame($instance, $instance->pageSizeName(''));
    }
}
