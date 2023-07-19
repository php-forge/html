<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use PHPForge\Html\Helper\WordFormatter;
use PHPUnit\Framework\TestCase;

final class WordFormatterTest extends TestCase
{
    public function testCapitalize(): void
    {
        $this->assertSame('Foo', WordFormatter::capitalizeToWords('foo'));
        $this->assertSame('Foo', WordFormatter::capitalizeToWords('Foo'));
        $this->assertSame('Foo bar', WordFormatter::capitalizeToWords('foo bar'));
        $this->assertSame('Foo bar', WordFormatter::capitalizeToWords('Foo Bar'));
        $this->assertSame('Created', WordFormatter::capitalizeToWords('created'));
        $this->assertSame('Created', WordFormatter::capitalizeToWords('CREATED'));
        $this->assertSame('Created At', WordFormatter::capitalizeToWords('created_at'));
        $this->assertSame('Created At', WordFormatter::capitalizeToWords('CREATED_AT'));
        $this->assertSame('Date Birth', WordFormatter::capitalizeToWords('dateBirth'));
        $this->assertSame('Date Of Message', WordFormatter::capitalizeToWords('dateOfMessage'));
    }
}
