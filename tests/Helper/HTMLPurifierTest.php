<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use PHPUnit\Framework\TestCase;

final class HTMLPurifierTest extends TestCase
{
    public function testG(): void
    {
        $g = HTMLPurifier::purifyAndEscapeHTML(
            '<g fill="grey" stroke="red" stroke-width="10" transform="translate(50,50)">
            <circle cx="50" cy="50" r="40">
            </circle>
            </g>',
        );

        $this->assertStringContainsString('fill=&quot;grey&quot;', $g);
        $this->assertStringContainsString('stroke=&quot;red&quot;', $g);
        $this->assertStringContainsString('stroke-width=&quot;10&quot;', $g);
        $this->assertStringContainsString('transform=&quot;translate(50,50)&quot;', $g);
    }

    public function testPath(): void
    {
        $path = HTMLPurifier::purifyAndEscapeHTML(
            '<path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/>',
        );

        $this->assertStringContainsString(
            'd=&quot;M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z&quot;',
            $path,
        );
    }

    public function testPolyline(): void
    {
        $polyline = HTMLPurifier::purifyAndEscapeHTML(
            '<polyline points="20,20 40,25 60,40 80,120 120,140 200,180" style="fill:none;stroke:black;stroke-width:3" />',
        );

        $this->assertStringContainsString('points=&quot;20,20 40,25 60,40 80,120 120,140 200,180&quot;', $polyline);
        $this->assertStringContainsString(
            'style=&quot;fill:none;stroke:black;stroke-width:3&quot;',
            $polyline,
        );
    }

    public function testRectangle(): void
    {
        $rect = HTMLPurifier::purifyAndEscapeHTML(
            '<rect x="10" y="20" width="300" height="100" style="fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)" />',
        );

        $this->assertStringContainsString('x=&quot;10&quot;', $rect);
        $this->assertStringContainsString('y=&quot;20&quot;', $rect);
        $this->assertStringContainsString('width=&quot;300&quot;', $rect);
        $this->assertStringContainsString('height=&quot;100&quot;', $rect);
        $this->assertStringContainsString(
            'style=&quot;fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)&quot;',
            $rect,
        );
    }

    public function testSvg(): void
    {
        $svg = HTMLPurifier::purifyAndEscapeHTML(
            '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 640 512"><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/></svg>'
        );

        $this->assertStringContainsString('version=&quot;1.1&quot;', $svg);
    }
}
