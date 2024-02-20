<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Password;

use PHPForge\Html\FormControl\Input\Password;
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
            <input id="password-6582f2d099e8b" type="password" aria-describedby="value">
            HTML,
            Password::widget()->ariaDescribedBy('value')->id('password-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" aria-label="value">
            HTML,
            Password::widget()->ariaLabel('value')->id('password-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="password-6582f2d099e8b" type="password">
            HTML,
            Password::widget()->attributes(['class' => 'value'])->id('password-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" autofocus>
            HTML,
            Password::widget()->autofocus()->id('password-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="password-6582f2d099e8b" type="password">
            HTML,
            Password::widget()->class('value')->id('password-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" data-value="value">
            HTML,
            Password::widget()->dataAttributes(['value' => 'value'])->id('password-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" disabled>
            HTML,
            Password::widget()->disabled()->id('password-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" form="value">
            HTML,
            Password::widget()->form('value')->id('password-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" aria-describedby="password-6582f2d099e8b-help">
            HTML,
            Password::widget()->ariaDescribedBy()->id('password-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password">
            HTML,
            Password::widget()->ariaDescribedBy(false)->id('password-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="password-', Password::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Password::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" hidden>
            HTML,
            Password::widget()->hidden()->id('password-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="password">
            HTML,
            Password::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" lang="value">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" name="value" type="password">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" placeholder="value">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->placeholder('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" readonly>
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testSize(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" size="1">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->size(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" style="value">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" tabindex="1">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" title="value">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" value="value">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="password">
            HTML,
            Password::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="password">
            HTML,
            Password::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
