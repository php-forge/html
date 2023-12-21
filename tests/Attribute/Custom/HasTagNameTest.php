<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasTagName;
use PHPUnit\Framework\TestCase;

final class HasTagNameTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasTagName;

            protected string $tagName = '';
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');

        $instance->tagName('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTagName;

            protected string $tagName = '';
        };

        $this->assertNotSame($instance, $instance->tagName('div'));
    }
}
