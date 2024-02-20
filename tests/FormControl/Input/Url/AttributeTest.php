<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Url;

use PHPForge\Html\FormControl\Input\Url;
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
            <input id="url-6582f2d099e8b" type="url" aria-describedby="value">
            HTML,
            Url::widget()->ariaDescribedBy('value')->id('url-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" aria-label="value">
            HTML,
            Url::widget()->ariaLabel('value')->id('url-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="url-6582f2d099e8b" type="url">
            HTML,
            Url::widget()->attributes(['class' => 'value'])->id('url-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" autofocus>
            HTML,
            Url::widget()->autofocus()->id('url-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="url-6582f2d099e8b" type="url">
            HTML,
            Url::widget()->class('value')->id('url-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" data-value="value">
            HTML,
            Url::widget()->dataAttributes(['value' => 'value'])->id('url-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" disabled>
            HTML,
            Url::widget()->disabled()->id('url-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" form="value">
            HTML,
            Url::widget()->form('value')->id('url-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" aria-describedby="url-6582f2d099e8b-help">
            HTML,
            Url::widget()->ariaDescribedBy()->id('url-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url">
            HTML,
            Url::widget()->ariaDescribedBy(false)->id('url-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="url-', Url::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Url::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" hidden>
            HTML,
            Url::widget()->hidden()->id('url-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="url">
            HTML,
            Url::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" lang="value">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" name="value" type="url">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" placeholder="value">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->placeholder('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" readonly>
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testSize(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" size="1">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->size(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" style="value">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" tabindex="1">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" title="value">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" value="value">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="url">
            HTML,
            Url::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="url">
            HTML,
            Url::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
