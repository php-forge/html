<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Week;

use PHPForge\Html\Input\Week;
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
            <input id="week-6582f2d099e8b" type="week" aria-describedby="value">
            HTML,
            Week::widget()->ariaDescribedBy('value')->id('week-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" aria-label="value">
            HTML,
            Week::widget()->ariaLabel('value')->id('week-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->attributes(['class' => 'value'])->id('week-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" autofocus>
            HTML,
            Week::widget()->autofocus()->id('week-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->class('value')->id('week-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" data-value="value">
            HTML,
            Week::widget()->dataAttributes(['value' => 'value'])->id('week-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" disabled>
            HTML,
            Week::widget()->disabled()->id('week-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" form="value">
            HTML,
            Week::widget()->form('value')->id('week-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" aria-describedby="week-6582f2d099e8b-help">
            HTML,
            Week::widget()->ariaDescribedBy()->id('week-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->ariaDescribedBy(false)->id('week-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="week-', Week::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Week::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" hidden>
            HTML,
            Week::widget()->hidden()->id('week-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="week">
            HTML,
            Week::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" lang="en">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" name="value" type="week">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" readonly>
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" step="1">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->step(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" style="value">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" tabindex="1">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" title="value">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" value="value">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="week">
            HTML,
            Week::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="week">
            HTML,
            Week::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
