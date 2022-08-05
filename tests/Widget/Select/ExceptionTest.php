<?php

declare(strict_types=1);

namespace Forge\Html\Widget\Select;

use Forge\Html\Widget\Select;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use StdClass;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Select widget value can not be an object.');
        Select::create()->value(new StdClass())->render();
    }
}
