<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Number;

use InvalidArgumentException;
use PHPForge\Html\Input\Number;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Number::class widget must be a numeric or null value.');

        Number::widget()->value([])->render();
    }
}
