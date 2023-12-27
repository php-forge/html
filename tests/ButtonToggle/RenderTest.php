<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonToggle;

use PHPForge\Html\ButtonToggle;
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
            <button id="button-toggle-658716145f1d9" type="button" aria-controls="id"></button>
            HTML,
            ButtonToggle::widget()->ariaControls(true)->id('button-toggle-658716145f1d9')->toggleId('id')->render()
        );
    }

    public function testAriaExpanded(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-expanded="false"></button>
            HTML,
            ButtonToggle::widget()->ariaExpanded('false')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-label="label"></button>
            HTML,
            ButtonToggle::widget()->ariaLabel('label')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="class" id="button-toggle-658716145f1d9" type="button"></button>
            HTML,
            ButtonToggle::widget()->attributes(['class' => 'class'])->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="class" id="button-toggle-658716145f1d9" type="button"></button>
            HTML,
            ButtonToggle::widget()->class('class')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" name="name" type="button"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->name('name')->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" style="style"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->style('style')->render()
        );
    }

    public function testToggleAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span class="class"></span>
            </button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->toggleAttributes(['class' => 'class'])->render()
        );
    }

    public function testToggleContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            <span>content</span>
            </button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->toggleContent('content')->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            ButtonToggle::widget()->name(null)->id('button-658716145f1d9')->render()
        );
    }
}
