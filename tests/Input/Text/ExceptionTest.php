<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Text;

use InvalidArgumentException;
use PHPForge\Html\Input\Text;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Text::class widget must be a string or null value.');

        Text::widget()->value([])->render();
    }
}
