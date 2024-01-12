<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Email;

use PHPForge\Html\Input\Email;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
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
            <input class="class" id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->attributes(['class' => 'class'])->id('email-65a15e0439570')->render()
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
            <input class="class" id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->class('class')->id('email-65a15e0439570')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" data-test="value">
            HTML,
            Email::widget()->dataAttributes(['test' => 'value'])->id('email-65a15e0439570')->render()
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
            <input id="email-65a15e0439570" type="email" form="form">
            HTML,
            Email::widget()->form('form')->id('email-65a15e0439570')->render()
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

    public function testHiddenInput(): void
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
            <input id="id" type="email">
            HTML,
            Email::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" lang="en">
            HTML,
            Email::widget()->lang('en')->id('email-65a15e0439570')->render()
        );
    }

    public function testMaxlength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" maxlength="10">
            HTML,
            Email::widget()->id('email-65a15e0439570')->maxLength(10)->render()
        );
    }

    public function testMinlength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" minlength="10">
            HTML,
            Email::widget()->id('email-65a15e0439570')->minLength(10)->render()
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
            <input id="email-65a15e0439570" name="name" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->name('name')->render()
        );
    }

    public function testPattern(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" pattern="pattern">
            HTML,
            Email::widget()->id('email-65a15e0439570')->pattern('pattern')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" placeholder="placeholder">
            HTML,
            Email::widget()->id('email-65a15e0439570')->placeholder('placeholder')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('class')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')
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
            <input id="email-65a15e0439570" type="email" readonly>
            HTML,
            Email::widget()->id('email-65a15e0439570')->readOnly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" required>
            HTML,
            Email::widget()->id('email-65a15e0439570')->required()->render()
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
            <input id="email-65a15e0439570" type="email" style="style;">
            HTML,
            Email::widget()->id('email-65a15e0439570')->style('style;')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            suffix
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div>
            suffix
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div class="class">
            suffix
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div class="class">
            suffix
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('class')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <span>suffix</span>
            HTML,
            Email::widget()->id('email-65a15e0439570')
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
            <input id="email-65a15e0439570" type="email" tabindex="1">
            HTML,
            Email::widget()->id('email-65a15e0439570')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="email-65a15e0439570" type="email">
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')->template('<div>\n{tag}\n</div>')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" title="title">
            HTML,
            Email::widget()->id('email-65a15e0439570')->title('title')->render()
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
}
