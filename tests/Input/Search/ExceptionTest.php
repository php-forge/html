<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Search;

use InvalidArgumentException;
use PHPForge\Html\Input\Search;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Search::class widget must be a string or null value.');

        Search::widget()->value([])->render();
    }
}
