<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Color;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Color;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Color::class widget must be a string or null value.');

        Color::widget()->value([])->render();
    }
}
