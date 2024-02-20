<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Checkbox;

use PHPForge\Html\FormControl\Input\Checkbox;
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
            <input id="checkbox-6582f2d099e8b" type="checkbox" aria-describedby="value">
            HTML,
            Checkbox::widget()->ariaDescribedBy('value')->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" aria-label="value">
            HTML,
            Checkbox::widget()->ariaLabel('value')->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="value" type="checkbox">
            HTML,
            Checkbox::widget()->attributes(['class' => 'value', 'id' => 'value'])->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" autofocus>
            HTML,
            Checkbox::widget()->autofocus()->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testChecked(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="1" checked>
            HTML,
            Checkbox::widget()->checked(1)->id('checkbox-6582f2d099e8b')->value(1)->render()
        );
    }

    public function testCheckedWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="1">
            HTML,
            Checkbox::widget()->checked(false)->id('checkbox-6582f2d099e8b')->value(1)->render()
        );
    }

    public function testCheckedWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="1">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->checked(null)->value(1)->render()
        );
    }

    public function testCheckedWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" checked>
            HTML,
            Checkbox::widget()->checked(true)->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->class('value')->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" data-value="value">
            HTML,
            Checkbox::widget()->dataAttributes(['value' => 'value'])->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" disabled>
            HTML,
            Checkbox::widget()->disabled()->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" form="form">
            HTML,
            Checkbox::widget()->form('form')->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" aria-describedby="checkbox-6582f2d099e8b-help">
            HTML,
            Checkbox::widget()->ariaDescribedBy()->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->ariaDescribedBy(false)->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="checkbox-', Checkbox::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Checkbox::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" hidden>
            HTML,
            Checkbox::widget()->hidden()->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="checkbox">
            HTML,
            Checkbox::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" lang="value">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" name="name" type="checkbox">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" readonly>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" style="value">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" tabindex="1">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" title="value">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        // Value bool `false`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="0">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->value(false)->render()
        );

        // Value bool `true`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="1" checked>
            HTML,
            Checkbox::widget()->checked(true)->id('checkbox-6582f2d099e8b')->value(true)->render()
        );

        // Value int `0`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="0">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->value(0)->render()
        );

        // Value int `1`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="1" checked>
            HTML,
            Checkbox::widget()->checked(1)->id('checkbox-6582f2d099e8b')->value(1)->render()
        );

        // Value string `inactive`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="inactive">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->value('inactive')->render()
        );

        // Value string `active`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="inactive" checked>
            HTML,
            Checkbox::widget()->checked('inactive')->id('checkbox-6582f2d099e8b')->value('inactive')->render()
        );
    }

    public function testValueWithDiferentTypes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox" value="1" checked>
            HTML,
            Checkbox::widget()->checked(1)->id('checkbox-6582f2d099e8b')->value('1')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->checked(null)->id('checkbox-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="checkbox">
            HTML,
            Checkbox::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="checkbox">
            HTML,
            Checkbox::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
