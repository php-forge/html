<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Button;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Button;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAriaControls(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-controls="id"></button>
            HTML,
            Button::widget()->ariaControls('id')->id('button-658716145f1d9')->render()
        );
    }

    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-describedby="MyWidget"></button>
            HTML,
            Button::widget()->ariaDescribedBy('MyWidget')->id('button-658716145f1d9')->render()
        );
    }

    public function testAriaDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-disabled="true"></button>
            HTML,
            Button::widget()->ariaDisabled('true')->id('button-658716145f1d9')->render()
        );
    }

    public function testAriaExpanded(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-expanded="true"></button>
            HTML,
            Button::widget()->ariaExpanded('true')->id('button-658716145f1d9')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-label="MyWidget"></button>
            HTML,
            Button::widget()->ariaLabel('MyWidget')->id('button-658716145f1d9')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="class" id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->attributes(['class' => 'class'])->id('button-658716145f1d9')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="class" id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->class('class')->id('button-658716145f1d9')->render()
        );
    }

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
            <div class="class">
            <button id="button-658716145f1d9" type="button"></button>
            </div>
            HTML,
            Button::widget()
                ->container(true)
                ->containerAttributes(['class' => 'class'])
                ->id('button-658716145f1d9')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            <button id="button-658716145f1d9" type="button"></button>
            </div>
            HTML,
            Button::widget()->container(true)->containerClass('class')->id('button-658716145f1d9')->render()
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

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button">content</button>
            HTML,
            Button::widget()->content('content')->id('button-658716145f1d9')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" data-collapse-toggle="MyWidget"></button>
            HTML,
            Button::widget()
                ->dataAttributes([DataAttributes::COLLAPSE_TOGGLE => 'MyWidget'])
                ->id('button-658716145f1d9')
                ->render()
        );
    }

    public function testGenerateAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-describedby="button-658716145f1d9-help"></button>
            HTML,
            Button::widget()->ariaDescribedBy(true)->id('button-658716145f1d9')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="id" type="button"></button>
            HTML,
            Button::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" lang="en"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" name="name" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('class')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->prefix('prefix')
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

    public function testReset(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="reset"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->reset()->render()
        );
    }

    public function testRole(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" role="button-role"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->role('button-role')->render()
        );
    }

    public function testSubmit(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="submit"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->submit()->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            suffix
            HTML,
            Button::widget()->id('button-658716145f1d9')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <div>
            suffix
            </div>
            HTML,
            Button::widget()->id('button-658716145f1d9')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <div class="class">
            suffix
            </div>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <div class="class">
            suffix
            </div>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('class')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            <span>suffix</span>
            HTML,
            Button::widget()
                ->id('button-658716145f1d9')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('span')
                ->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" style="style"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->style('style')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" tabindex="1"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            suffix
            HTML,
            Button::widget()->id('button-658716145f1d9')->template('{tag}{suffix}')->suffix('suffix')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" title="test-title"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->title('test-title')->render()
        );
    }
}
