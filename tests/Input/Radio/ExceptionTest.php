<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Radio;

use InvalidArgumentException;
use PHPForge\Html\Input\Radio;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Radio::class widget must be a scalar value.');

        Radio::widget()->value([])->render();
    }
}
