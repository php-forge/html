<?php

declare(strict_types=1);

namespace PHPForge\Component\Tests\I;

use PHPForge\Html\I;
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
            <i></i>
            HTML,
            I::widget()->prefix('value')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <i></i>
            HTML,
            I::widget()->prefixContainer(true)->prefix('value')->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <i></i>
            HTML,
            I::widget()
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
            <i></i>
            HTML,
            I::widget()->prefixContainer(true)->prefix('value')->prefixContainerClass('value')->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <i></i>
            HTML,
            I::widget()->prefixContainer(true)->prefix('value')->prefixContainerTag('span')->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <i></i>
            HTML,
            I::widget()->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <i></i>
            value
            HTML,
            I::widget()->suffix('value')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <i></i>
            <div>
            value
            </div>
            HTML,
            I::widget()->suffixContainer(true)->suffix('value')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <i></i>
            <div class="value">
            value
            </div>
            HTML,
            I::widget()
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
            <i></i>
            <div class="value">
            value
            </div>
            HTML,
            I::widget()->suffixContainer(true)->suffix('value')->suffixContainerClass('value')->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <i></i>
            <span>value</span>
            HTML,
            I::widget()->suffixContainer(true)->suffix('value')->suffixContainerTag('span')->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <i>value</i>
            </div>
            HTML,
            I::widget()->content('value')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
