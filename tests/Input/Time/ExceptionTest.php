<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Time;

use InvalidArgumentException;
use PHPForge\Html\Input\Time;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Time::class widget must be a string or null value.');

        Time::widget()->value([])->render();
    }
}
