<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Radio;

use PHPForge\Html\Input\Radio;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class RenderTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" aria-describedby="MyWidget">
            HTML,
            Radio::widget()->ariaDescribedBy('MyWidget')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" aria-label="MyWidget">
            HTML,
            Radio::widget()->ariaLabel('MyWidget')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->attributes(['class' => 'class', 'id' => 'radio-6582f2d099e8b'])->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" autofocus>
            HTML,
            Radio::widget()->autofocus()->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testChecked(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="1" checked>
            HTML,
            Radio::widget()->checked(true)->id('radio-6582f2d099e8b')->value(1)->render()
        );
    }

    public function testCheckedWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="1">
            HTML,
            Radio::widget()->checked(false)->id('radio-6582f2d099e8b')->value(1)->render()
        );
    }

    public function testCheckedValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="1" checked>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->checkedValue(1)->value(1)->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->class('class')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()->container(true)->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->containerAttributes(['class' => 'class'])
                ->id('radio-6582f2d099e8b')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()->container(true)->containerClass('class')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span><input id="radio-6582f2d099e8b" type="radio"></span>
            HTML,
            Radio::widget()->container(true)->containerTag('span')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->container(false)->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" data-test="data-value">
            HTML,
            Radio::widget()->dataAttributes(['test' => 'data-value'])->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" disabled>
            HTML,
            Radio::widget()->disabled()->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testEnclosedByLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="radio-6582f2d099e8b">
            <input id="radio-6582f2d099e8b" type="radio">
            Red
            </label>
            HTML,
            Radio::widget()->enclosedByLabel(true)->id('radio-6582f2d099e8b')->labelContent('Red')->render()
        );
    }

    public function testEnclosedByLabelWithLabelContentEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->enclosedByLabel(true)->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testEnclosedByLabelWithLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="label-for">
            <input id="checkbox-6582f2d099e8b" type="radio">
            Red
            </label>
            HTML,
            Radio::widget()
                ->enclosedByLabel(true)
                ->id('checkbox-6582f2d099e8b')
                ->labelContent('Red')
                ->labelFor('label-for')
                ->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" form="form">
            HTML,
            Radio::widget()->form('form')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" hidden>
            HTML,
            Radio::widget()->hidden()->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="radio">
            HTML,
            Radio::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" lang="en">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Active')->render()
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label class="class" for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
                ->labelAttributes(['class' => 'class'])
                ->labelContent('Active')
                ->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label class="class" for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelClass('class')->labelContent('Active')->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="radio">
            <label for="label-for">Red</label>
            HTML,
            Radio::widget()->id('checkbox-6582f2d099e8b')->labelContent('Red')->labelFor('label-for')->render()
        );
    }

    public function testLoadDefinitionContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget(['container()' => [false]])->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" name="name" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Red')->notLabel()->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Red')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div>
            prefix
            </div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div class="class">
            prefix
            </div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
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
            <div>
            <div class="class">
            prefix
            </div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
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
            <div>
            <span>prefix</span>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('span')
                ->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" readonly>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" required>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->required()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" style="style">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            suffix
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Red')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            <div>
            suffix
            </div>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            <div class="class">
            suffix
            </div>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
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
            <div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            <div class="class">
            suffix
            </div>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
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
            <div>
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Red</label>
            <span>suffix</span>
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Red')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('span')
                ->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" tabindex="1">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            suffix
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
                ->prefix('prefix')
                ->suffix('suffix')
                ->template('{tag}\n{suffix}')
                ->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" title="title">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testUnchecked(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input type="hidden" value="0">
            <input id="radio-6582f2d099e8b" type="radio" value="1">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->uncheckValue('0')->value(1)->render()
        );
    }

    public function testValue(): void
    {
        // Value bool `false`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="0">
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Active')->value(false)->render()
        );

        // Value bool `true`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="1" checked>
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()
                ->checkedValue(true)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Active')
                ->value(true)
                ->render()
        );

        // Value int `0`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="0">
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Active')->value(0)->render()
        );

        // Value int `1`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="1" checked>
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->checkedValue(1)->id('radio-6582f2d099e8b')->labelContent('Active')->value(1)->render()
        );

        // Value string `inactive`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="inactive">
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->labelContent('Active')->value('inactive')->render()
        );

        // Value string `active`.
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="inactive" checked>
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()
                ->checkedValue('inactive')
                ->id('radio-6582f2d099e8b')
                ->labelContent('Active')
                ->value('inactive')
                ->render()
        );
    }

    public function testValueWithDiferentTypes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" value="1" checked>
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()
                ->checkedValue(1)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Active')
                ->value('1')
                ->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()
                ->checkedValue(null)
                ->id('radio-6582f2d099e8b')
                ->labelContent('Active')
                ->value(null)
                ->render()
        );
    }
}
