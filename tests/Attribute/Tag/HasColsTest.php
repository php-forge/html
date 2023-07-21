<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasCols;
use PHPUnit\Framework\TestCase;

final class HasColsTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasCols;
        };

        $this->assertNotSame($instance, $instance->cols(0));
    }
}
