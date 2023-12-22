<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\CheckboxList;

use InvalidArgumentException;
use PHPForge\Html\Input\Radio;
use PHPForge\Html\Input\RadioList;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('RadioList::class widget must be a scalar value.');

        RadioList::widget()->items(Radio::widget())->value([])->render();
    }
}
