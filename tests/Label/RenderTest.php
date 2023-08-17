<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Label;

use PHPForge\Html\Label;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testContent(): void
    {
        $this->assertSame('<label>Sam & Dark</label>', Label::widget()->content('Sam & Dark')->render());
    }

    public function testContentWithXSS(): void
    {
        $this->assertSame('<label></label>', Label::widget()->content("<script>alert('Hack');</script>")->render());
    }

    public function testElement(): void
    {
        $this->assertSame('<label></label>', Label::widget()->render());
    }

    public function testFor(): void
    {
        $this->assertSame('<label for="name">Name</label>', Label::widget()->content('Name')->for('name')->render());
    }
}
