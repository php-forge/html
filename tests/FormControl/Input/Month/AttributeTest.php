<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Month;

use PHPForge\{Html\FormControl\Input\Month, Support\Assert};
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
            <input id="month-6582f2d099e8b" type="month" aria-describedby="value">
            HTML,
            Month::widget()->ariaDescribedBy('value')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" aria-label="value">
            HTML,
            Month::widget()->ariaLabel('value')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->attributes(['class' => 'value'])->id('month-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" autofocus>
            HTML,
            Month::widget()->autofocus()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->class('value')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" data-value="value">
            HTML,
            Month::widget()->dataAttributes(['value' => 'value'])->id('month-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" disabled>
            HTML,
            Month::widget()->disabled()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" form="value">
            HTML,
            Month::widget()->form('value')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" aria-describedby="month-6582f2d099e8b-help">
            HTML,
            Month::widget()->ariaDescribedBy()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->ariaDescribedBy(false)->id('month-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="month-', Month::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Month::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" hidden>
            HTML,
            Month::widget()->hidden()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="month">
            HTML,
            Month::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" lang="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" name="value" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" readonly>
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" style="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" tabindex="1">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" title="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" value="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="FormModelName[property]" type="month">
            HTML,
            Month::widget()->fieldAttributes('FormModelName', 'property')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" type="month">
            HTML,
            Month::widget()->fieldAttributes('FormModelName', 'property')->name(null)->render()
        );
    }
}
