<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Image;

use PHPForge\{Html\FormControl\Input\Image, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAlt(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" alt="value">
            HTML,
            Image::widget()->alt('value')->id('image-65a15e0439570')->render()
        );
    }

    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" aria-describedby="value">
            HTML,
            Image::widget()->ariaDescribedBy('value')->id('image-65a15e0439570')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" aria-label="value">
            HTML,
            Image::widget()->ariaLabel('value')->id('image-65a15e0439570')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->attributes(['class' => 'value'])->id('image-65a15e0439570')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" autofocus>
            HTML,
            Image::widget()->autoFocus()->id('image-65a15e0439570')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->class('value')->id('image-65a15e0439570')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" data-value="value">
            HTML,
            Image::widget()->dataAttributes(['value' => 'value'])->id('image-65a15e0439570')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" disabled>
            HTML,
            Image::widget()->disabled()->id('image-65a15e0439570')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" form="form">
            HTML,
            Image::widget()->form('form')->id('image-65a15e0439570')->render()
        );
    }

    public function testFormaction(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" formaction="value">
            HTML,
            Image::widget()->formAction('value')->id('image-65a15e0439570')->render()
        );
    }

    public function testFormenctype(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" formenctype="multipart/form-data">
            HTML,
            Image::widget()->formEncType('multipart/form-data')->id('image-65a15e0439570')->render()
        );
    }

    public function testFormmethod(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" formmethod="GET">
            HTML,
            Image::widget()->formmethod('GET')->id('image-65a15e0439570')->render()
        );
    }

    public function testFormnovalidate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" formnovalidate>
            HTML,
            Image::widget()->formNoValidate()->id('image-65a15e0439570')->render()
        );
    }

    public function testFormtarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" formtarget="_blank">
            HTML,
            Image::widget()->formTarget('_blank')->id('image-65a15e0439570')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="image-', Image::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Image::widget()->value('value')->getValue());
    }

    public function testHeight(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" height="1">
            HTML,
            Image::widget()->height(1)->id('image-65a15e0439570')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" hidden>
            HTML,
            Image::widget()->id('image-65a15e0439570')->hidden()->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="image">
            HTML,
            Image::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" lang="en">
            HTML,
            Image::widget()->lang('en')->id('image-65a15e0439570')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" name="name" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->name('name')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" readonly>
            HTML,
            Image::widget()->id('image-65a15e0439570')->readOnly()->render()
        );
    }

    public function testSrc(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" src="value">
            HTML,
            Image::widget()->id('image-65a15e0439570')->src('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" style="value">
            HTML,
            Image::widget()->id('image-65a15e0439570')->style('value')->render()
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" tabindex="1">
            HTML,
            Image::widget()->id('image-65a15e0439570')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" title="title">
            HTML,
            Image::widget()->id('image-65a15e0439570')->title('title')->render()
        );
    }

    public function testValuewithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="ModelName[fieldName]" type="image">
            HTML,
            Image::widget()->generateField('ModelName', 'fieldName')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" type="image">
            HTML,
            Image::widget()->generateField('ModelName', 'fieldName')->name(null)->render()
        );
    }
}
