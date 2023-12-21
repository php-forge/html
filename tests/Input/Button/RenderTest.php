<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Button;

use PHPForge\Html\Input\Button;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" aria-describedby="MyWidget">
            </div>
            HTML,
            Button::widget()->ariaDescribedBy('MyWidget')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" aria-label="MyWidget">
            </div>
            HTML,
            Button::widget()->ariaLabel('MyWidget')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAttribute(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="class" id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->attributes(['class' => 'class'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="class" id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->class('class')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->containerAttributes(['class' => 'class'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->containerClass('class')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testContainerTagName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span><input id="text-6582f2d099e8b" type="button"></span>
            HTML,
            Button::widget()->containerTag('span')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="button">
            HTML,
            Button::widget()->container(false)->id('text-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" disabled>
            </div>
            HTML,
            Button::widget()->disabled()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" form="form">
            </div>
            HTML,
            Button::widget()->form('form')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" aria-describedby="text-6582f2d099e8b-help">
            </div>
            HTML,
            Button::widget()->ariaDescribedBy()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBywithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->ariaDescribedBy(false)->id('text-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" hidden>
            </div>
            HTML,
            Button::widget()->hidden()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="id" type="button">
            </div>
            HTML,
            Button::widget()->id('id')->render()
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label for="text-6582f2d099e8b">Label</label>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->labelContent('Label')->render()
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label class="class" for="text-6582f2d099e8b">Label</label>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()
                ->id('text-6582f2d099e8b')
                ->labelAttributes(['class' => 'class'])
                ->labelContent('Label')
                ->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label class="class" for="text-6582f2d099e8b">Label</label>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->labelClass('class')->labelContent('Label')->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label for="label-for">Label</label>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->labelContent('Label')->LabelFor('label-for')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" name="name" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->notLabel()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->render()
        );
    }

    public function style(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" style="style" type="button">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" tabindex="1">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" title="title">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->type('reset')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="text-6582f2d099e8b" type="button" value="value">
            </div>
            HTML,
            Button::widget()->id('text-6582f2d099e8b')->value('value')->render()
        );
    }
}
