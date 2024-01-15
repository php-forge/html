<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\File;

use PHPForge\Html\Input\File;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
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
}
