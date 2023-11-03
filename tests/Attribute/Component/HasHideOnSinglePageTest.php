<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasHideOnSinglePage;
use PHPUnit\Framework\TestCase;

final class HasHideOnSinglePageTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasHideOnSinglePage;
        };

        $this->assertNotSame($instance, $instance->hideOnSinglePage(true));
    }
}
