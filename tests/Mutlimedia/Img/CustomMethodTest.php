<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Mutlimedia\Img;

use PHPForge\Html\Multimedia\Img;
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
            value
            <img>
            HTML,
            Img::widget()->prefix('value')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <img>
            HTML,
            Img::widget()->prefixContainer(true)->prefix('value')->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <img>
            HTML,
            Img::widget()
                ->prefixContainer(true)
                ->prefix('value')
                ->prefixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <img>
            HTML,
            Img::widget()->prefixContainer(true)->prefix('value')->prefixContainerClass('value')->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <img>
            HTML,
            Img::widget()->prefixContainer(true)->prefix('value')->prefixContainerTag('span')->render()
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

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <div>
            value
            </div>
            HTML,
            Img::widget()->suffixContainer(true)->suffix('value')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <div class="value">
            value
            </div>
            HTML,
            Img::widget()
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <div class="value">
            value
            </div>
            HTML,
            Img::widget()->suffixContainer(true)->suffix('value')->suffixContainerClass('value')->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img>
            <span>value</span>
            HTML,
            Img::widget()->suffixContainer(true)->suffix('value')->suffixContainerTag('span')->render()
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
