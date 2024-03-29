<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\DatetimeLocal;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\DatetimeLocal;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('DatetimeLocal::class widget must be a string or null value.');

        DatetimeLocal::widget()->value([])->render();
    }
}
