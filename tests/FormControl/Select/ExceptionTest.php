<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Select;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Select;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testMultiple(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Select::class widget value must be an array when multiple is "true".');

        Select::widget()->multiple()->value('')->render();
    }

    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Select::class widget value can not be an object.');

        Select::widget()->value(new stdClass())->render();
    }
}
