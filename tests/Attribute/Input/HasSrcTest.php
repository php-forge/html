<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasSrc;
use PHPUnit\Framework\TestCase;

final class HasSrcTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasSrc;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->src(''));
    }
}
