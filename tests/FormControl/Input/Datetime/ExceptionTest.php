<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Datetime;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Datetime;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Datetime::class widget must be a string or null value.');

        Datetime::widget()->value([])->render();
    }
}
