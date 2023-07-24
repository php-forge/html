<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Svg;

use PHPForge\Html\Svg;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends TestCase
{
    public function testImmutable(): void
    {
        $svg = Svg::widget();

        $this->assertNotSame($svg, $svg->content(''));
        $this->assertNotSame($svg, $svg->filePath('php.svg'));
        $this->assertNotSame($svg, $svg->fill(''));
        $this->assertNotSame($svg, $svg->height(0));
        $this->assertNotSame($svg, $svg->stroke(''));
        $this->assertNotSame($svg, $svg->viewBox(''));
        $this->assertNotSame($svg, $svg->width(0));
        $this->assertNotSame($svg, $svg->xmlns(''));
    }
}
