<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use PHPForge\Html\Helper\Encode;
use PHPUnit\Framework\TestCase;

final class EncodeTest extends TestCase
{
    public function testCleanXSS(): void
    {
        $this->assertSame(
            '<button><img src="http://fakeurl.com/fake.jpg" /></button>',
            Encode::cleanXSS('<button><img src="http://fakeurl.com/fake.jpg" onerror="alert(\'XSS\')"/></button>'),
        );
        $this->assertSame(
            '<form><input type="text" value="test" /></form>',
            Encode::cleanXSS('<form><input type="text" value="test" onfocus="alert(\'XSS\')"/></form>'),
        );
        $this->assertSame(
            '<input type="text" value="test"  />',
            Encode::cleanXSS('<input type="text" value="test" onfocus="alert(\'XSS\')" />'),
        );
        $this->assertSame(
            '<select><option value="test">test</option></select>',
            Encode::cleanXSS('<select><option value="test">test</option></select>'),
        );
        $this->assertSame(
            '<svg></svg>',
            Encode::cleanXSS('<svg><script>alert("XSS")</script></svg>'),
        );
        $this->assertSame(
            '<textarea></textarea>',
            Encode::cleanXSS('<textarea><script>alert("XSS")</script></textarea>'),
        );
    }

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
