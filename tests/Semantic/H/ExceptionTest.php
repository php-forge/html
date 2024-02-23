<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Semantic\H;

use InvalidArgumentException;
use PHPForge\Html\Semantic\H;
use PHPUnit\Framework\TestCase;

final class ExceptionTest extends TestCase
{
    public function testTagnameWithEmptyValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('H::class widget must have a tag name.');

        H::widget()->tagName('')->render();
    }

    public function testTagnameWithInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "span" for the tagname method. Allowed values are: "h1", "h2", "h3", "h4", "h5", "h6".'
        );

        H::widget()->tagName('span')->render();
    }
}
