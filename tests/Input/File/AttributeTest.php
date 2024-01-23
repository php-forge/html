<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\File;

use PHPForge\Html\Input\File;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAccept(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" accept="value">
            HTML,
            File::widget()->accept('value')->id('file-65a15e0439570')->render()
        );
    }

    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" aria-describedby="value">
            HTML,
            File::widget()->ariaDescribedBy('value')->id('file-65a15e0439570')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" aria-label="value">
            HTML,
            File::widget()->ariaLabel('value')->id('file-65a15e0439570')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->attributes([
                'class' => 'value',
            ])->id('file-65a15e0439570')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" autofocus>
            HTML,
            File::widget()->autofocus()->id('file-65a15e0439570')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->class('value')->id('file-65a15e0439570')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" data-test="value">
            HTML,
            File::widget()->dataAttributes([
                'test' => 'value',
            ])->id('file-65a15e0439570')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" disabled>
            HTML,
            File::widget()->disabled()->id('file-65a15e0439570')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" form="value">
            HTML,
            File::widget()->form('value')->id('file-65a15e0439570')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="file-', File::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', File::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" hidden>
            HTML,
            File::widget()->hidden()->id('file-65a15e0439570')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="file">
            HTML,
            File::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" lang="value">
            HTML,
            File::widget()->id('file-65a15e0439570')->lang('value')->render()
        );
    }

    public function testMultiple(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" multiple>
            HTML,
            File::widget()->id('file-65a15e0439570')->multiple()->render()
        );
    }

    public function testMutipleWithName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" name="value[]" type="file" multiple>
            HTML,
            File::widget()->id('file-65a15e0439570')->multiple()->name('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" name="value" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" readonly>
            HTML,
            File::widget()->id('file-65a15e0439570')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" required>
            HTML,
            File::widget()->id('file-65a15e0439570')->required()->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" style="value">
            HTML,
            File::widget()->id('file-65a15e0439570')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" tabindex="1">
            HTML,
            File::widget()->tabIndex(1)->id('file-65a15e0439570')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" title="value">
            HTML,
            File::widget()->id('file-65a15e0439570')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->value('value')->render()
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input type="file">
            HTML,
            File::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->name(null)->render()
        );
    }
}
