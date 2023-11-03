<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasHref;
use PHPUnit\Framework\TestCase;

final class HasHrefTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasHref;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->href(''));
    }
}
