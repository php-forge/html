<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateIterable;
use PHPUnit\Framework\TestCase;

final class HasValidateIterableTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasValidateIterable;

            public function run(): void
            {
                $this->validateIterable('string');
            }
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('class widget must be an iterable or null value.');

        $instance->run();
    }
}
