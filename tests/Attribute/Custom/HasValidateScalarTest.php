<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateScalar;
use PHPUnit\Framework\TestCase;

final class HasValidateScalarTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasValidateScalar;

            public function run(): void
            {
                $this->validateScalar([]);
            }
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('class widget must be a scalar value.');

        $instance->run();
    }
}
