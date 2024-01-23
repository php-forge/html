<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Footer;

use PHPForge\Html\Footer;
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
            <footer class="test-class">
            </footer>
            HTML,
            Footer::widget()->attributes([
                'class' => 'test-class',
            ])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer class="test-class">
            </footer>
            HTML,
            Footer::widget()->class('test-class')->render(),
        );
    }

    public function testBlockLevelElements(): void
    {
        $this->assertSame('<footer>test block</footer>', Footer::widget()->begin() . 'test block' . Footer::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer>
            test element
            </footer>
            HTML,
            Footer::widget()->content('test element')->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer id="test-id">
            </footer>
            HTML,
            Footer::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer lang="en">
            </footer>
            HTML,
            Footer::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer name="test-name">
            </footer>
            HTML,
            Footer::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer style="color: red;">
            </footer>
            HTML,
            Footer::widget()->style('color: red;')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer title="test-title">
            </footer>
            HTML,
            Footer::widget()->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer>
            </footer>
            HTML,
            Footer::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer>
            </footer>
            HTML,
            Footer::widget()->name(null)->render(),
        );
    }
}
