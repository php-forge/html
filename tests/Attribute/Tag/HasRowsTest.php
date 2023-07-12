<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasRows;
use PHPUnit\Framework\TestCase;

final class HasRowsTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasRows;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->rows(0));
    }
}
