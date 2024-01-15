<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Image;

use InvalidArgumentException;
use PHPForge\Html\Input\Image;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Image::class widget must be a string or null value.');

        Image::widget()->value(1)->render();
    }
}
