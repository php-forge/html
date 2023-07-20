<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\H;

use PHPForge\Html\H;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<h1>test block</h1>', H::widget()->begin() . 'test block' . H::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1>
            test element
            </h1>
            HTML,
            H::widget()->content('test element')->render(),
        );
    }

    public function testTagName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h2>
            test tag name
            </h2>
            HTML,
            H::widget()->tagName('h2')->content('test tag name')->render(),
        );
    }
}
