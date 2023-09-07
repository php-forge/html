<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasPage;
use PHPUnit\Framework\TestCase;

final class HasPageTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPage;
        };

        $this->assertNotSame($instance, $instance->currentPage(1));
        $this->assertNotSame($instance, $instance->pageName(''));
    }
}
