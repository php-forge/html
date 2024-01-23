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
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 class="test-class">
            </h1>
            HTML,
            H::widget()->attributes([
                'class' => 'test-class',
            ])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 class="test-class">
            </h1>
            HTML,
            H::widget()->class('test-class')->render(),
        );
    }

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

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 id="test-id">
            </h1>
            HTML,
            H::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 lang="en">
            </h1>
            HTML,
            H::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 name="test-name">
            </h1>
            HTML,
            H::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 style="color: red;">
            </h1>
            HTML,
            H::widget()->style('color: red;')->render(),
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

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1 title="test-title">
            </h1>
            HTML,
            H::widget()->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1>
            </h1>
            HTML,
            H::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <h1>
            </h1>
            HTML,
            H::widget()->name(null)->render(),
        );
    }
}
