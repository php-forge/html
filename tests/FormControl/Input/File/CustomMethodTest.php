<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\File;

use PHPForge\{Html\FormControl\Input\File, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testFieldAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" name="FormModelName[property]" type="file">
            HTML,
            File::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testFieldAttributesWithMultiple(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" name="FormModelName[property][]" type="file" multiple>
            HTML,
            File::widget()->fieldAttributes('FormModelName', 'property')->multiple()->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
                ->prefix('value')
                ->prefixAttributes(['class' => 'value'])
                ->prefixTag('div')
                ->render()
        );
    }

    public function testPrefixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->prefix('value')->prefixClass('value')->prefixTag('div')->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="file-65a15e0439570" type="file">
            HTML,
            File::widget()->id('file-65a15e0439570')->prefix('value')->prefixTag(false)->render()
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

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            value
            HTML,
            File::widget()->id('file-65a15e0439570')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            <div class="value">
            value
            </div>
            HTML,
            File::widget()
                ->id('file-65a15e0439570')
                ->suffix('value')
                ->suffixAttributes(['class' => 'value'])
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            <div class="value">
            value
            </div>
            HTML,
            File::widget()->id('file-65a15e0439570')->suffix('value')->suffixClass('value')->suffixTag('div')->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            <span>value</span>
            HTML,
            File::widget()->id('file-65a15e0439570')->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file">
            value
            HTML,
            File::widget()->id('file-65a15e0439570')->suffix('value')->suffixTag(false)->render()
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
