<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPForge\Html\Helper\HTMLPurifier;

final class HackingTest extends TestCase
{
    /**
     * @dataProvider contentProvider
     */
    public function testXssMitigation($input, $expectedOutput)
    {
        $cleanContent = HtmlPurifier::purifyAndEscapeHTML($input);

        $this->assertSame($expectedOutput, $cleanContent);
    }

    // Data provider with test cases to check for XSS vulnerabilities
    public static function contentProvider(): array
    {
        return [
            // Safe HTML content should remain unchanged
            [
                "<p><strong>Hello</strong> <a href='https://example.com' target='_blank'>Visit our site</a></p>",
                "<p><strong>Hello</strong> <a href=&quot;https://example.com&quot; target=&quot;_blank&quot; rel=&quot;noreferrer noopener&quot;>Visit our site</a></p>",
            ],
            // HTML with malicious JavaScript should be encoded
            [
                "<script>alert('XSS attack!');</script>",
                "",
            ],
            // HTML with encoded malicious JavaScript should remain unchanged
            [
                "&lt;script&gt;alert('XSS attack!');&lt;/script&gt;",
                "&lt;script&gt;alert(&apos;XSS attack!&apos;);&lt;/script&gt;",
            ],
            // SVG content should be properly encoded
            [
                "<svg xmlns='http://www.w3.org/2000/svg'><circle cx='50' cy='50' r='40' fill='red' /></svg>",
                "<svg xmlns=&quot;http://www.w3.org/2000/svg&quot;><circle cx=&quot;50&quot; cy=&quot;50&quot; r=&quot;40&quot;></circle></svg>",
            ],
        ];
    }
}
