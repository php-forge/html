<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasHttpEquiv;
use PHPUnit\Framework\TestCase;

final class HasHttpEquivTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasHttpEquiv;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->httpEquiv('test', 'test'));
    }
}
