<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Button;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Button;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testTagNameWithEmptyValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Button::class widget must have a tag name.');

        Button::widget()->tagName('');
    }

    public function testTagnameWithInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value "div" for the tagname method. Allowed values are: "a", "button".');

        Button::widget()->tagName('div')->render();
    }
}
