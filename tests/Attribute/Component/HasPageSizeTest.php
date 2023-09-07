<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasPageSize;
use PHPUnit\Framework\TestCase;

final class HasPageSizeTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPageSize;
        };

        $this->assertNotSame($instance, $instance->pageSize(0));
        $this->assertNotSame($instance, $instance->pageSizeName(''));
    }
}
