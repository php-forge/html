<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Tag\HasLinkClass;
use PHPUnit\Framework\TestCase;

final class HasLinkClassTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLinkClass;
        };

        $this->assertNotSame($instance, $instance->linkClass(''));
    }
}
