<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Button;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Button;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Button::class widget must be a string or null value.');

        Button::widget()->value([])->render();
    }
}
