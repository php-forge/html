<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\CanBeNoValidate;
use PHPUnit\Framework\TestCase;

final class CanBeNoValidateTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeNoValidate;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->noValidate());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeNoValidate;

            public array $attributes = [];
        };

        $this->assertEmpty($instance->attributes);
        $this->assertSame([
            'novalidate' => true,
        ], $instance->noValidate()->attributes);
    }
}
