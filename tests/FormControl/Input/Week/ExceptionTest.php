<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Week;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Week;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Week::class widget must be a string or null value.');

        Week::widget()->value([])->render();
    }
}
