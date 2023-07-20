<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Html;

use PHPForge\Html\Tag;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<div>test block</div>', Tag::widget()->tagName('div')->begin() . 'test block' . Tag::end());
    }

    public function testElement(): void
    {
        $this->assertSame('<button>Submit</button>', Tag::widget()->content('Submit')->tagName('button')->render());
    }
}
