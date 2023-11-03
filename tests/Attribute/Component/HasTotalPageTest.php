<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasTotalPage;
use PHPUnit\Framework\TestCase;

final class HasTotalPageTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasTotalPage;
        };

        $this->assertNotSame($instance, $instance->totalPage(1));
    }
}
