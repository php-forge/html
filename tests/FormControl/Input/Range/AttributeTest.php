<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Range;

use PHPForge\Html\FormControl\Input\Range;
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
            <input id="range-6582f2d099e8b" type="range" aria-describedby="value">
            HTML,
            Range::widget()->ariaDescribedBy('value')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" aria-label="value">
            HTML,
            Range::widget()->ariaLabel('value')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->attributes(['class' => 'value'])->id('range-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" autofocus>
            HTML,
            Range::widget()->autofocus()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->class('value')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" data-value="value">
            HTML,
            Range::widget()->dataAttributes(['value' => 'value'])->id('range-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" disabled>
            HTML,
            Range::widget()->disabled()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" form="value">
            HTML,
            Range::widget()->form('value')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" aria-describedby="range-6582f2d099e8b-help">
            HTML,
            Range::widget()->ariaDescribedBy()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->ariaDescribedBy(false)->id('range-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="range-', Range::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Range::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" hidden>
            HTML,
            Range::widget()->hidden()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="range">
            HTML,
            Range::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" lang="value">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" name="value" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" readonly>
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" style="value">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" tabindex="1">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" title="value">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" value="1">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->value(1)->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="range">
            HTML,
            Range::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="range">
            HTML,
            Range::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
