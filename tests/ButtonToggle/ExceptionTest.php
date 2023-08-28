<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonToggle;

use InvalidArgumentException;
use PHPForge\Html\ButtonToggle;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testWithoutID(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The toogle id attribute is required for the "ButtonToggle::class".');

        ButtonToggle::widget()->render();
    }
}
