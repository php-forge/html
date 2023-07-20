<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Html;

use InvalidArgumentException;
use PHPForge\Html\Tag;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testWithEmptyValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');

        Tag::widget()->tagName('')->begin();
    }

    public function testWithoutTagName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');

        Tag::widget()->render();
    }

    public function testWithoutTagNameBeginEnd(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');

        Tag::widget()->begin() . Tag::end();
    }
}
