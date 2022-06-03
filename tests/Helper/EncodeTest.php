<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Helper;

use Forge\Html\Helper\Encode;
use PHPUnit\Framework\TestCase;

final class EncodeTest extends TestCase
{
    public function encodeProvider(): array
    {
        return [
            ["a<>&\"'\x80", 'a&lt;&gt;&amp;&quot;&apos;�',],
            ['Sam & Dark', 'Sam &amp; Dark'],
        ];
    }

    /**
     * @dataProvider encodeProvider
     *
     * @param string $value Value to encode.
     * @param string $expected Expected result.
     */
    public function testEncode(string $value, string $expected): void
    {
        $encode = new Encode();
        $this->assertSame($expected, $encode->content($value));
    }
}
