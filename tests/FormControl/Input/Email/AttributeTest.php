<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Email;

use PHPForge\{Html\FormControl\Input\Email, Support\Assert};
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
            <input id="email-65a15e0439570" type="email" aria-describedby="value">
            HTML,
            Email::widget()->ariaDescribedBy('value')->id('email-65a15e0439570')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" aria-label="value">
            HTML,
            Email::widget()->ariaLabel('value')->id('email-65a15e0439570')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->attributes(['class' => 'value'])->id('email-65a15e0439570')->render()
        );
    }

    public function testAutocomplete(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" autocomplete="on">
            HTML,
            Email::widget()->autoComplete('on')->id('email-65a15e0439570')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" autofocus>
            HTML,
            Email::widget()->autoFocus()->id('email-65a15e0439570')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->class('value')->id('email-65a15e0439570')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" data-value="value">
            HTML,
            Email::widget()->dataAttributes(['value' => 'value'])->id('email-65a15e0439570')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" disabled>
            HTML,
            Email::widget()->disabled()->id('email-65a15e0439570')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" form="value">
            HTML,
            Email::widget()->form('value')->id('email-65a15e0439570')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" aria-describedby="email-65a15e0439570-help">
            HTML,
            Email::widget()->ariaDescribedBy()->id('email-65a15e0439570')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->ariaDescribedBy(false)->id('email-65a15e0439570')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="email-', Email::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Email::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" hidden>
            HTML,
            Email::widget()->id('email-65a15e0439570')->hidden()->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="email">
            HTML,
            Email::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" lang="value">
            HTML,
            Email::widget()->lang('value')->id('email-65a15e0439570')->render()
        );
    }

    public function testMultiple(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" multiple>
            HTML,
            Email::widget()->id('email-65a15e0439570')->multiple()->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" name="value" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->name('value')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" placeholder="value">
            HTML,
            Email::widget()->id('email-65a15e0439570')->placeholder('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" readonly>
            HTML,
            Email::widget()->id('email-65a15e0439570')->readOnly()->render()
        );
    }

    public function testSize(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" size="1">
            HTML,
            Email::widget()->id('email-65a15e0439570')->size(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" style="value">
            HTML,
            Email::widget()->id('email-65a15e0439570')->style('value')->render()
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" tabindex="1">
            HTML,
            Email::widget()->id('email-65a15e0439570')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" title="value">
            HTML,
            Email::widget()->id('email-65a15e0439570')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" value="value">
            HTML,
            Email::widget()->id('email-65a15e0439570')->value('value')->render()
        );
    }

    public function testValuewithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="FormModelName[property]" type="email">
            HTML,
            Email::widget()->fieldAttributes('FormModelName', 'property')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" type="email">
            HTML,
            Email::widget()->fieldAttributes('FormModelName', 'property')->name(null)->render()
        );
    }
}
