<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Submit;

use InvalidArgumentException;
use PHPForge\Html\Input\Submit;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Submit::class widget must be a string or null value.');

        Submit::widget()->value([])->render();
    }
}
