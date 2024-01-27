<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonToggle;

use PHPForge\Html\ButtonToggle;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testIcon(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <i>value</i>
            </button>
            HTML,
            ButtonToggle::widget()->icon(true)->iconContent('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testIconAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <i class="value">value</i>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconAttributes(['class' => 'value'])
                ->iconContent('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <i class="value">value</i>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconClass('value')
                ->iconContent('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <div>
            <i>value</i>
            </div>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconContainer(true)
                ->iconContent('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <div class="value">
            <i>value</i>
            </div>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconContainer(true)
                ->iconContainerAttributes(['class' => 'value'])
                ->iconContent('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <div class="value">
            <i>value</i>
            </div>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconContainer(true)
                ->iconContainerClass('value')
                ->iconContent('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span><i>value</i></span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconContainer(true)
                ->iconContainerTag('span')
                ->iconContent('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <i>value</i>
            </button>
            HTML,
            ButtonToggle::widget()->icon(true)->iconContent('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testIconFilePath(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconFilePath(dirname(__DIR__, 2) . '/src/Base/Svg/toggle.svg')
                ->iconTag('svg')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testIconTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span>value</span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->icon(true)
                ->iconContent('value')
                ->iconTag('span')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testToggle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span>value</span>
            </button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->toggle(true)->toggleContent('value')->render()
        );
    }

    public function testToggleAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span class="value">value</span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->id('button-toggle-658716145f1d9')
                ->toggle(true)
                ->toggleAttributes(['class' => 'value'])
                ->toggleContent('value')
                ->render()
        );
    }

    public function testToggleClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span class="value">value</span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->id('button-toggle-658716145f1d9')
                ->toggle(true)
                ->toggleClass('value')
                ->toggleContent('value')
                ->render()
        );
    }

    public function testToggleContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span>value</span>
            </button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->toggleContent('value')->render()
        );
    }

    public function testToggleDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span data-bs-toggle="value">value</span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->id('button-toggle-658716145f1d9')
                ->toggleDataAttribute('bs-toggle', 'value')
                ->toggleContent('value')
                ->render()
        );
    }

    public function testToggleId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="value" type="button">
            <span id="value">value</span>
            </button>
            HTML,
            ButtonToggle::widget()->id('value')->toggleId('value')->toggleContent('value')->render()
        );
    }

    public function testTogglePrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="value" type="button">
            value
            <span>value</span>
            </button>
            HTML,
            ButtonToggle::widget()->id('value')->togglePrefix('value')->toggleContent('value')->render()
        );
    }

    public function testToggleSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="value" type="button">
            <span>value</span>
            value
            </button>
            HTML,
            ButtonToggle::widget()->id('value')->toggleSuffix('value')->toggleContent('value')->render()
        );
    }

    public function testToggleTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="value" type="button">
            <svg>value</svg>
            </button>
            HTML,
            ButtonToggle::widget()->id('value')->toggleTag('svg')->toggleContent('value')->render()
        );
    }
}
