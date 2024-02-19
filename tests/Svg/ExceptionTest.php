<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Svg;

use Exception;
use InvalidArgumentException;
use PHPForge\Html\Svg;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testFilePathEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('File path and content cannot be empty at the same time for SVG widget.');

        Svg::widget()->filePath('')->render();
    }

    public function testFilePathInvalidPath(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to read SVG file: php.svg');

        Svg::widget()->filePath('php.svg')->render();
    }

    public function testFileSvgFailedToRead(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to sanitize SVG file:');

        Svg::widget()->filePath(__DIR__ . '/Stub/svg-failed.svg')->render();
    }
}
