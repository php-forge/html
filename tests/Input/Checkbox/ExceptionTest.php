<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Checkbox;

use InvalidArgumentException;
use PHPForge\Html\Input\Checkbox;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Checkbox::class widget value can not be an iterable or an object.');

        Checkbox::widget()->value([])->render();
    }
}
