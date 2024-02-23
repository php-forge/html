<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateInList;
use PHPUnit\Framework\TestCase;

final class HasValidateInListTest extends TestCase
{
    public function testExceptionWithInvalidValue(): void
    {
        $instance = new class () {
            use HasValidateInList;

            public function run(): void
            {
                $this->validateInList(
                    'value',
                    '%s::class widget must have a tag name of "%s".',
                    'h1',
                    'h2',
                    'h3',
                    'h4',
                    'h5',
                    'h6'
                );
            }
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('value::class widget must have a tag name of "h1", "h2", "h3", "h4", "h5", "h6".');

        $instance->run();
    }
}
