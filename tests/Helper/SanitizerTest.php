<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use PHPForge\Html\A;
use PHPForge\Html\Helper\Sanitizer;
use PHPForge\Html\Img;
use PHPForge\Html\Svg;
use PHPUnit\Framework\TestCase;

final class SanitizerTest extends TestCase
{
    public function testAllowLinkSchemesHttp(): void
    {
        $this->assertSame(
            '<a href="http://example.com" rel="noopener noreferrer">Link</a>',
            Sanitizer::clean(A::widget()->href('http://example.com')->content('Link')->render()),
        );
    }

    public function testAllowLinkSchemesHttps(): void
    {
        $this->assertSame(
            '<a href="https://example.com" rel="noopener noreferrer">Link</a>',
            Sanitizer::clean(A::widget()->href('https://example.com')->content('Link')->render()),
        );
    }

    public function testAllowLinkSchemesMailto(): void
    {
        $this->assertSame(
            '<a href="mailto:mailto:email&#64;example.com)" rel="noopener noreferrer">Email</a>',
            Sanitizer::clean(A::widget()->href('mailto:mailto:email@example.com)')->content('Email')->render()),
        );
    }

    public function testAllowMediaHostsAny(): void
    {
        $this->assertSame(
            '<img src="https://otherhost.com/image.jpg" alt="Image" />',
            Sanitizer::clean(Img::widget()->src('https://otherhost.com/image.jpg')->alt('Image')->render()),
        );
    }

    public function testAllowMediaHostsExample(): void
    {
        $this->assertSame(
            '<img src="https://example.com/image.jpg" alt="Image" />',
            Sanitizer::clean(Img::widget()->src('https://example.com/image.jpg')->alt('Image')->render()),
        );
    }

    public function testAllowMediaSchemesHttp(): void
    {
        $this->assertSame(
            '<img src="http://example.com/image.jpg" alt="Image" />',
            Sanitizer::clean(Img::widget()->src('http://example.com/image.jpg')->alt('Image')->render()),
        );
    }

    public function testAllowMediaSchemesHttps(): void
    {
        $this->assertSame(
            '<img src="https://example.com/image.jpg" alt="Image" />',
            Sanitizer::clean(Img::widget()->src('https://example.com/image.jpg')->alt('Image')->render()),
        );
    }

    public function testDisallowLinkSchemesOther(): void
    {
        $this->assertSame(
            '<a rel="noopener noreferrer">Link</a>',
            Sanitizer::clean(A::widget()->href('javascript:alert(\'XSS\')')->content('Link')->render()),
        );
    }

    public function testSvg(): void
    {
        $this->assertSame(
            '<svg class="w-6 h-6" aria-hidden="true" fill="currentColor"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>',
            Sanitizer::clean(Svg::widget()->filePath(__DIR__ . '/Stub/toggle.svg')->render()),
        );
    }
}
