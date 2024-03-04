<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Image;

use PHPForge\{Html\FormControl\Input\Image, Support\Assert};
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
            <input id="formmodelname-property" name="FormModelName[property]" type="image">
            HTML,
            Image::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()
                ->id('image-65a15e0439570')
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
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()
                ->id('image-65a15e0439570')
                ->prefix('value')
                ->prefixClass('value')
                ->prefixTag('div')
                ->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="image-65a15e0439570" type="image">
            HTML,
            Image::widget()->id('image-65a15e0439570')->prefix('value')->prefixTag(false)->render()
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

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            value
            HTML,
            Image::widget()->id('image-65a15e0439570')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            <div class="value">
            value
            </div>
            HTML,
            Image::widget()
                ->id('image-65a15e0439570')
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
            <input id="image-65a15e0439570" type="image">
            <div class="value">
            value
            </div>
            HTML,
            Image::widget()
                ->id('image-65a15e0439570')
                ->suffix('value')
                ->suffixClass('value')
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            <span>value</span>
            HTML,
            Image::widget()->id('image-65a15e0439570')->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalsevalue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="image-65a15e0439570" type="image">
            value
            HTML,
            Image::widget()->id('image-65a15e0439570')->suffix('value')->suffixTag(false)->render()
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
}
