<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Tag;

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
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            test element
            </div>
            HTML,
            Tag::widget()->content('test element')->tagName('div')->render(),
        );
    }
}