<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasCharset;
use PHPUnit\Framework\TestCase;

final class HasCharsetTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasCharset;
        };

        $this->assertNotSame($instance, $instance->charset(''));
    }
}
