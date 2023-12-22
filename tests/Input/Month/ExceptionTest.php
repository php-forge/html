<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Month;

use InvalidArgumentException;
use PHPForge\Html\Input\Month;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Month::class widget must be a string or null value.');

        Month::widget()->value([])->render();
    }
}
