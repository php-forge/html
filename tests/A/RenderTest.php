<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\A;

use PHPForge\Html\A;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testRender(): void
    {
        $this->assertSame('<a></a>', A::widget()->render());
    }
}
