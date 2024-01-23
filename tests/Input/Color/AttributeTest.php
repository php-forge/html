<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Color;

use PHPForge\Html\Input\Color;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" aria-describedby="value">
            HTML,
            Color::widget()->ariaDescribedBy('value')->id('color-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" aria-label="value">
            HTML,
            Color::widget()->ariaLabel('value')->id('color-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->attributes([
                'class' => 'value',
            ])->id('color-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" autofocus>
            HTML,
            Color::widget()->autofocus()->id('color-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->class('value')->id('color-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" data-value="value">
            HTML,
            Color::widget()->dataAttributes([
                'value' => 'value',
            ])->id('color-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" disabled>
            HTML,
            Color::widget()->disabled()->id('color-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" form="value">
            HTML,
            Color::widget()->form('value')->id('color-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" aria-describedby="color-6582f2d099e8b-help">
            HTML,
            Color::widget()->ariaDescribedBy()->id('color-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->ariaDescribedBy(false)->id('color-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="color-', Color::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Color::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" hidden>
            HTML,
            Color::widget()->hidden()->id('color-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="color">
            HTML,
            Color::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" lang="value">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" name="value" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" readonly>
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" required>
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->required()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" style="value">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" tabindex="1">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" title="value">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" value="value">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input type="color">
            HTML,
            Color::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->name(null)->render()
        );
    }
}
