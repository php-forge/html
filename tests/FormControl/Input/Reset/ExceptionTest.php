<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Reset;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Reset;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Reset::class widget must be a string or null value.');

        Reset::widget()->value([])->render();
    }
}
