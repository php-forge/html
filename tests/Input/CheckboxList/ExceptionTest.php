<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\CheckboxList;

use InvalidArgumentException;
use PHPForge\Html\Input\CheckboxList;
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
        $this->expectExceptionMessage('CheckboxList::class widget must be an iterable or null value.');

        CheckboxList::widget()->checkedValue(1)->render();
    }
}
