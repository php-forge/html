<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Reset;

use PHPForge\Html\Input\Reset;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->containerAttributes([
                'class' => 'value',
            ])->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->containerClass('value')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span><input id="reset-6582f2d099e8b" type="reset"></span>
            HTML,
            Reset::widget()->containerTag('span')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="reset-6582f2d099e8b" type="reset">
            HTML,
            Reset::widget()->container(false)->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalseWithDefinitions(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="reset-6582f2d099e8b" type="reset">
            HTML,
            Reset::widget([
                'container()' => [false],
            ])->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            Prefix
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->prefix('Prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div>
            Prefix
            </div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->prefix('Prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div class="value">
            Prefix
            </div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()
                ->id('reset-6582f2d099e8b')
                ->prefix('Prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes([
                    'class' => 'value',
                ])
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <span>Prefix</span>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()
                ->id('reset-6582f2d099e8b')
                ->prefix('Prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('span')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            Suffix
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->suffix('Suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            <div>
            Suffix
            </div>
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->suffix('Suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            <div class="value">
            Suffix
            </div>
            </div>
            HTML,
            Reset::widget()
                ->id('reset-6582f2d099e8b')
                ->suffix('Suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes([
                    'class' => 'value',
                ])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            <div class="value">
            Suffix
            </div>
            </div>
            HTML,
            Reset::widget()
                ->id('reset-6582f2d099e8b')
                ->suffix('Suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            <span>Suffix</span>
            </div>
            HTML,
            Reset::widget()
                ->id('reset-6582f2d099e8b')
                ->suffix('Suffix')
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
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
