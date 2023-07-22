<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Span;

use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testRender(): void
    {
        $this->assertSame('<span></span>', Span::widget()->render());
    }
}
