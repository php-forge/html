<?php

declare(strict_types=1);

namespace PHPForge\Component\Tests\I;

use PHPForge\Html\I;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testRender(): void
    {
        $this->assertSame('<i></i>', I::widget()->render());
    }
}
