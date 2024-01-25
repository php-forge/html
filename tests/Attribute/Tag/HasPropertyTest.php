<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasProperty;
use PHPUnit\Framework\TestCase;

final class HasPropertyTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasProperty;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->property('test', 'test'));
    }
}
