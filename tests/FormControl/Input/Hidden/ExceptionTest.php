<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Hidden;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Hidden;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must be a string or null value.');

        Hidden::widget()->value([])->render();
    }
}
