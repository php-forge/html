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
        $this->expectExceptionMessage('H::class widget must have a tag name of h1, h2, h3, h4, h5, h6.');

        H::widget()->tagName('span')->render();
    }
}
