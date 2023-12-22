<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\RadioList;

use InvalidArgumentException;
use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\CheckboxList;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('CheckboxList::class widget must be a scalar value.');

        CheckboxList::widget()->items(Checkbox::widget())->value([])->render();
    }
}
