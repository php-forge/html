<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Mutlimedia\Img;

use PHPForge\{Html\Multimedia\Img, Support\Assert};
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
            value
            <img>
            HTML,
            Img::widget()->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <img>
            HTML,
            Img::widget()->prefix('value')->prefixAttributes(['class' => 'value'])->prefixTag('div')->render()
        );
    }

    public function testPrefixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <img>
            HTML,
            Img::widget()->prefix('value')->prefixClass('value')->prefixTag('div')->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <img>
            HTML,
            Img::widget()->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <img>
            HTML,
            Img::widget()->prefix('value')->prefixTag(false)->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            HTML,
            Img::widget()->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            value
            HTML,
            Img::widget()->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <div class="value">
            value
            </div>
            HTML,
            Img::widget()->suffix('value')->suffixAttributes(['class' => 'value'])->suffixTag('div')->render()
        );
    }

    public function testSuffixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <div class="value">
            value
            </div>
            HTML,
            Img::widget()->suffix('value')->suffixClass('value')->suffixTag('div')->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <span>value</span>
            HTML,
            Img::widget()->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            value
            HTML,
            Img::widget()->suffix('value')->suffixTag(false)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <img src="value">
            </div>
            HTML,
            Img::widget()->src('value')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
