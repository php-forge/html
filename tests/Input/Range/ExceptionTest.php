<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Range;

use InvalidArgumentException;
use PHPForge\Html\Input\Range;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Range::class widget must be a numeric or null value.');

        Range::widget()->value([])->render();
    }
}
