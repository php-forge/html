<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Img;

use PHPForge\Html\Img;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testElement(): void
    {
        $this->assertSame('<img>', Img::widget()->render());
    }
}
