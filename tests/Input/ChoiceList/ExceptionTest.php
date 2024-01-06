<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\ChoiceList;

use InvalidArgumentException;
use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\ChoiceList;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('ChoiceList::class widget must be a scalar value.');

        ChoiceList::widget()->items(Checkbox::widget())->checkedValue([])->render();
    }
}
