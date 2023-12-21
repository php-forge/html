<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasDownload;
use PHPUnit\Framework\TestCase;

final class HasDownloadTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasDownload;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->download());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasDownload;

            protected array $attributes = [];

            public function getDownload(): bool
            {
                return $this->attributes['download'] ?? false;
            }
        };

        $this->assertFalse($instance->getDownload());
        $this->assertTrue($instance->download()->getDownload());
    }
}
