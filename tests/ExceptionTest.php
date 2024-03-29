<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use InvalidArgumentException;
use PHPForge\Html\HtmlBuilder;
use PHPUnit\Framework\TestCase;

final class ExceptionTest extends TestCase
{
    public function testBeginInlineElement(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Inline elements cannot be used with begin/end syntax.');

        HtmlBuilder::begin('br');
    }

    public function testEndInlineElement(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Inline elements cannot be used with begin/end syntax.');

        HtmlBuilder::end('br');
    }

    public function testTagEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');

        HtmlBuilder::create('');
    }
}
