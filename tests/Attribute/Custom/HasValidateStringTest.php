<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateString;
use PHPUnit\Framework\TestCase;

final class HasValidateStringTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasValidateString;

            public function run(): void
            {
                $this->validateString([]);
            }
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('class widget must be a string or null value.');

        $instance->run();
    }
}
