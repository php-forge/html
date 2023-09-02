<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Div;

use PHPForge\Html\Div;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="test-class">
            </div>
            HTML,
            Div::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="test-class">
            </div>
            HTML,
            Div::widget()->class('test-class')->render(),
        );
    }

    public function testBlockLevelElements(): void
    {
        $this->assertSame('<div>test block</div>', Div::widget()->begin() . 'test block' . Div::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            test element
            </div>
            HTML,
            Div::widget()->content('test element')->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="test-id">
            </div>
            HTML,
            Div::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div lang="en">
            </div>
            HTML,
            Div::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div name="test-name">
            </div>
            HTML,
            Div::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div style="color: red;">
            </div>
            HTML,
            Div::widget()->style('color: red;')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div title="test-title">
            </div>
            HTML,
            Div::widget()->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            </div>
            HTML,
            Div::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            </div>
            HTML,
            Div::widget()->name(null)->render(),
        );
    }
}
