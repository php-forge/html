<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Html;

use PHPForge\Html\Html;
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
            <html class="test-class">
            </html>
            HTML,
            Html::widget()->attributes([
                'class' => 'test-class',
            ])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html class="test-class">
            </html>
            HTML,
            Html::widget()->class('test-class')->render(),
        );
    }

    public function testBlockLevelElements(): void
    {
        $this->assertSame('<html>test block</html>', Html::widget()->begin() . 'test block' . Html::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html>
            test element
            </html>
            HTML,
            Html::widget()->content('test element')->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html id="test-id">
            </html>
            HTML,
            Html::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html lang="en">
            </html>
            HTML,
            Html::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html name="test-name">
            </html>
            HTML,
            Html::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html style="color: red;">
            </html>
            HTML,
            Html::widget()->style('color: red;')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html title="test-title">
            </html>
            HTML,
            Html::widget()->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html>
            </html>
            HTML,
            Html::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html>
            </html>
            HTML,
            Html::widget()->name(null)->render(),
        );
    }
}
