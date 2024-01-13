<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\File;

use PHPForge\Html\Input\File;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
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
            File::widget()->attributes(['class' => 'value'])->id('file-65a15e0439570')->render()
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
            File::widget()->dataAttributes(['test' => 'value'])->id('file-65a15e0439570')->render()
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

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
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
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
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
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
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
            <input id="file-65a15e0439570" type="file" readonly>
            HTML,
            File::widget()->id('file-65a15e0439570')->readonly()->render()
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

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            suffix
            HTML,
            File::widget()->id('file-65a15e0439570')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            <div>
            suffix
            </div>
            HTML,
            File::widget()->id('file-65a15e0439570')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            <div class="value">
            suffix
            </div>
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
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
            <input id="file-65a15e0439570" type="file">
            <div class="value">
            suffix
            </div>
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
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
            <input id="file-65a15e0439570" type="file">
            <span>suffix</span>
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('span')
                ->render()
        );
    }

    public function tabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" tabindex="1">
            HTML,
            File::widget()->tabIndex(1)->id('file-65a15e0439570')->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="file-65a15e0439570" type="file">
            </div>
            HTML,
            File::widget()->id('file-65a15e0439570')->template('<div>\n{tag}\n</div>')->render()
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

    public function testUnckeckAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" type="hidden" value="0">
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
                ->uncheckAttributes(['class' => 'value'])
                ->uncheckValue('0')
                ->render()
        );
    }

    public function testUncheckClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" type="hidden" value="0">
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->uncheckClass('value')->uncheckValue('0')->render()
        );
    }

    public function testUncheckName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="value" type="hidden" value="0">
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->uncheckName('value')->uncheckValue('0')->render()
        );
    }

    public function testUncheckValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input type="hidden" value="0">
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->uncheckValue('0')->render()
        );
    }

    public function testUncheckValueWithName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="value" type="hidden" value="0">
            <input id="file-65a15e0439570" name="value" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->name('value')->uncheckValue('0')->render()
        );
    }

    public function testUncheckValueWithNameAndMultiple(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="value[]" type="hidden" value="0">
            <input id="file-65a15e0439570" name="value[]" type="file" multiple>
            HTML,
            File::widget()->id('file-65a15e0439570')->name('value')->multiple()->uncheckValue('0')->render()
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
}
