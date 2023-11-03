<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasMaxLinksPerPage;
use PHPUnit\Framework\TestCase;

final class HasMaxLinksPerPageTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasMaxLinksPerPage;
        };

        $this->assertNotSame($instance, $instance->maxLinksPerPage(5));
    }
}
