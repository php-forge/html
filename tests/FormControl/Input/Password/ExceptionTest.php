<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Password;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Password;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Password::class widget must be a string or null value.');

        Password::widget()->value([])->render();
    }
}
