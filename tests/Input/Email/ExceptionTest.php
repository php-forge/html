<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Email;

use InvalidArgumentException;
use PHPForge\Html\Input\Email;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Email::class widget must be a string or null value.');

        Email::widget()->value(1)->render();
    }
}
