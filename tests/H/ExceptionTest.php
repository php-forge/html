<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\H;

use InvalidArgumentException;
use PHPForge\Html\H;
use PHPUnit\Framework\TestCase;

final class ExceptionTest extends TestCase
{
    public function testBeginInlineElement(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid tag name, only h1 to h6 are allowed.');

        H::widget()->tagName('span')->render();
    }
}
