<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Provider;

final class EncodeProvider
{
    public static function encode(): array
    {
        return [
            ["a<>&\"'\x80", 'a&lt;&gt;&amp;&quot;&apos;�', false],
            ["a<>&amp;\"'\x80", 'a&lt;&gt;&amp;amp;&quot;&apos;�', true],
            ['Sam & Dark', 'Sam &amp; Dark', false],
            ['Sam &amp; Dark', 'Sam &amp;amp; Dark', true],
            ['\u{0000}', '\u{0000}', false],
            ['\u{0000}', '\u{0000}', true],
        ];
    }

    public static function encodeValue(): array
    {
        return [
            ["a<>&\"'\x80", 'a&lt;&gt;&amp;&quot;&apos;�', false],
            ["a<>&amp;\"'\x80", 'a&lt;&gt;&amp;amp;&quot;&apos;�', true],
            ['Sam & Dark', 'Sam &amp; Dark', false],
            ['Sam &amp; Dark', 'Sam &amp;amp; Dark', true],
            ['\u{0000}', '&#0;', false],
            ['\u{0000}', '&#0;', true],
        ];
    }
}
