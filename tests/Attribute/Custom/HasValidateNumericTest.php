<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateNumeric;
use PHPUnit\Framework\TestCase;

final class HasValidateNumericTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasValidateNumeric;

            public function run(): void
            {
                $this->validateNumeric([]);
            }
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('class widget must be a numeric or null value.');

        $instance->run();
    }
}
