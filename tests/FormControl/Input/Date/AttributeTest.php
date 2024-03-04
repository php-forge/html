<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Date;

use PHPForge\{Html\FormControl\Input\Date, Support\Assert};
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
            <input id="date-6582f2d099e8b" type="date" aria-describedby="value">
            HTML,
            Date::widget()->ariaDescribedBy('value')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" aria-label="value">
            HTML,
            Date::widget()->ariaLabel('value')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->attributes(['class' => 'value'])->id('date-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" autofocus>
            HTML,
            Date::widget()->autofocus()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->class('value')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" data-value="value">
            HTML,
            Date::widget()->dataAttributes([
                'value' => 'value',
            ])->id('date-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" disabled>
            HTML,
            Date::widget()->disabled()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" form="value">
            HTML,
            Date::widget()->form('value')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" aria-describedby="date-6582f2d099e8b-help">
            HTML,
            Date::widget()->ariaDescribedBy()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->ariaDescribedBy(false)->id('date-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="date-', Date::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Date::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" hidden>
            HTML,
            Date::widget()->hidden()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="date">
            HTML,
            Date::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" lang="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" name="value" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" readonly>
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" style="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" tabindex="1">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" title="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" value="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="FormModelName[property]" type="date">
            HTML,
            Date::widget()->fieldAttributes('FormModelName', 'property')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" type="date">
            HTML,
            Date::widget()->fieldAttributes('FormModelName', 'property')->name(null)->render()
        );
    }
}
