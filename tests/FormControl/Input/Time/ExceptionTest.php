<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Time;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Time;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must be a string or null value. The value is: array.');

        Time::widget()->value([])->render();
    }
}
