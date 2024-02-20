<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Checkbox;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Checkbox;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Checkbox::class widget must be a scalar value.');

        Checkbox::widget()->value([])->render();
    }
}
