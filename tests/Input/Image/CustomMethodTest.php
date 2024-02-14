<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Image;

use PHPForge\Html\Input\Image;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" name="ModelName[fieldName]" type="image">
            HTML,
            Image::widget()->generateField('ModelName', 'fieldName')->render()
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
