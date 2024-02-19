<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Button;

use InvalidArgumentException;
use PHPForge\Html\Button;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testTagName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Button::class widget must have a tag name of a, button.');

        Button::widget()->tagName('div')->render();
    }

    public function testWithoutTagName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Button::class widget must have a tag name.');

        Button::widget()->tagName('');
    }
}
