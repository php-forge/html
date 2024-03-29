<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasAction;
use PHPUnit\Framework\TestCase;

final class HasActionTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAction;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->action(''));
    }
}
