<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Svg;
use PHPUnit\Framework\TestCase;

final class EncodeTest extends TestCase
{
    /**
     * @dataProvider PHPForge\Html\Tests\Provider\EncodeProvider::encode
     *
     * @param string $value Value to encode.
     * @param string $expected Expected result.
     * @param bool $doubleEncode Whether to encode HTML entities in `$value`.
     */
    public function testContent(string $value, string $expected, bool $doubleEncode): void
    {
        $this->assertSame($expected, Encode::content($value));
        $this->assertSame($expected, Encode::content($value, $doubleEncode));
    }

    public function testIsInvalidTag(): void
    {
        $this->assertFalse(Encode::isValidTag(''));
    }

    public function testIsValidSvg(): void
    {
        $this->assertFalse(
            Encode::isValidTag(
                <<<HTML
                <svg class='w-6 h-6' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z' clip-rule='evenodd'></path>
                </svg>
                HTML
            )
        );
    }

    public function testIsInvalidSvg(): void
    {
        $this->assertFalse(Encode::isValidTag('<svg'));
    }

    /**
     * @dataProvider PHPForge\Html\Tests\Provider\EncodeProvider::encodeValue
     *
     * @param string $value Value to encode.
     * @param string $expected Expected result.
     * @param bool $doubleEncode Whether to encode HTML entities in `$value`.
     */
    public function testValue(string $value, string $expected, bool $doubleEncode): void
    {
        $this->assertSame($expected, Encode::value($value));
        $this->assertSame($expected, Encode::value($value, $doubleEncode));
    }
}
