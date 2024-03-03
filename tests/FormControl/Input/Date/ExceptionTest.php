<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Date;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Date;
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

        Date::widget()->value([])->render();
    }
}
