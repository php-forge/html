<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Url;

use InvalidArgumentException;
use PHPForge\Html\FormControl\Input\Url;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Url::class widget must be a string or null value.');

        Url::widget()->value([])->render();
    }
}
