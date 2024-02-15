<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Time;

use PHPForge\Html\Input\Time;
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
            <input id="time-6582f2d099e8b" type="time" aria-describedby="value">
            HTML,
            Time::widget()->ariaDescribedBy('value')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" aria-label="value">
            HTML,
            Time::widget()->ariaLabel('value')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->attributes(['class' => 'value'])->id('time-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" autofocus>
            HTML,
            Time::widget()->autofocus()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->class('value')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" data-value="value">
            HTML,
            Time::widget()->dataAttributes(['value' => 'value'])->id('time-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" disabled>
            HTML,
            Time::widget()->disabled()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" form="value">
            HTML,
            Time::widget()->form('value')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" aria-describedby="time-6582f2d099e8b-help">
            HTML,
            Time::widget()->ariaDescribedBy()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->ariaDescribedBy(false)->id('time-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="time-', Time::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Time::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" hidden>
            HTML,
            Time::widget()->hidden()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="time">
            HTML,
            Time::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" lang="value">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" name="value" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" readonly>
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" step="1">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->step('1')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" style="style">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" tabindex="1">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" title="value">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" value="value">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="time">
            HTML,
            Time::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="time">
            HTML,
            Time::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
