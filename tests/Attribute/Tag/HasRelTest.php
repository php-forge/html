<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasRel;
use PHPUnit\Framework\TestCase;

final class HasRelTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class {
            use HasRel;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The rel attribute value must be one of "alternate", "author", "bookmark", "help", "icon", "license", "next", "nofollow", "noopener", "noreferrer", "pingback", "preconnect", "prefetch", "preload", "prerender", "prev", "search", "sidebar", "stylesheet", "tag".'
        );

        $instance->rel('');
    }

    public function testImmutablity(): void
    {
        $instance = new class {
            use HasRel;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->rel('alternate'));
    }
}
