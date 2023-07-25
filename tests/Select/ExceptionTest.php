<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Select;

use InvalidArgumentException;
use PHPForge\Html\Select;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Select::class widget value can not be an object.');

        Select::widget()->value(new stdClass())->render();
    }
}
