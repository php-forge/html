<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Button;

use PHPForge\Html\FormControl\Button;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <button id="button-658716145f1d9" type="button"></button>
            </div>
            HTML,
            Button::widget()->container(true)->id('button-658716145f1d9')->render()
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <button id="button-658716145f1d9" type="button"></button>
            </div>
            HTML,
            Button::widget()
                ->container(true)
                ->containerAttributes(['class' => 'value'])
                ->id('button-658716145f1d9')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <button id="button-658716145f1d9" type="button"></button>
            </div>
            HTML,
            Button::widget()->container(true)->containerClass('value')->id('button-658716145f1d9')->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span><button id="button-658716145f1d9" type="button"></button></span>
            HTML,
            Button::widget()->container(true)->containerTag('span')->id('button-658716145f1d9')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->prefix('value')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->prefix('value')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->prefix('value')
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
            value
            </div>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->prefix('value')
                ->prefixContainer(true)
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->prefix('value')
                ->prefixContainer(true)
                ->prefixContainerTag('span')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            value
            HTML,
            Button::widget()->id('button-658716145f1d9')->suffix('value')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <div>
            value
            </div>
            HTML,
            Button::widget()->id('button-658716145f1d9')->suffix('value')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <div class="value">
            value
            </div>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->suffix('value')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <div class="value">
            value
            </div>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->suffix('value')
                ->suffixContainer(true)
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <span>value</span>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->suffix('value')
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
            <button id="button-658716145f1d9" type="button"></button>
            </div>
            HTML,
            Button::widget()->id('button-658716145f1d9')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
