<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Image;

use PHPForge\Html\Input\Image;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
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
            <input id="image-65a15e0439570" type="image" data-test="value">
            HTML,
            Image::widget()->dataAttributes(['test' => 'value'])->id('image-65a15e0439570')->render()
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

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('span')
                ->render()
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

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->render()
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

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            suffix
            HTML,
            Image::widget()->id('image-65a15e0439570')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            <div>
            suffix
            </div>
            HTML,
            Image::widget()->id('image-65a15e0439570')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            <div class="value">
            suffix
            </div>
            HTML,
            Image::widget()->id('image-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            <div class="value">
            suffix
            </div>
            HTML,
            Image::widget()->id('image-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            <span>suffix</span>
            HTML,
            Image::widget()->id('image-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('span')
                ->render()
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

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="image-65a15e0439570" type="image">
            </div>
            HTML,
            Image::widget()->id('image-65a15e0439570')->template('<div>\n{tag}\n</div>')->render()
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

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image" src="value">
            HTML,
            Image::widget()->id('image-65a15e0439570')->value('value')->render()
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
}
