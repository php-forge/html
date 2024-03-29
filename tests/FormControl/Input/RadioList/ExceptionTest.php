<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\RadioList;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\RadioList;
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
        $this->expectExceptionMessage('RadioList::class widget must be a scalar value.');

        RadioList::widget()->checked([])->render();
    }
}
