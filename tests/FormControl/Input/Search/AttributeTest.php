<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Search;

use PHPForge\{Html\FormControl\Input\Search, Support\Assert};

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends \PHPUnit\Framework\TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" aria-describedby="value">
            HTML,
            Search::widget()->ariaDescribedBy('value')->id('search-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" aria-label="value">
            HTML,
            Search::widget()->ariaLabel('value')->id('search-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->attributes(['class' => 'value'])->id('search-6582f2d099e8b')->render()
        );
    }

    public function testAutoComplete(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" autocomplete="on">
            HTML,
            Search::widget()->autoComplete('on')->id('search-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" autofocus>
            HTML,
            Search::widget()->autofocus()->id('search-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->class('value')->id('search-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" data-value="value">
            HTML,
            Search::widget()->dataAttributes(['value' => 'value'])->id('search-6582f2d099e8b')->render()
        );
    }

    public function testDirname(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" dirname="value">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->dirname('value')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" disabled>
            HTML,
            Search::widget()->disabled()->id('search-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" form="value">
            HTML,
            Search::widget()->form('value')->id('search-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" aria-describedby="search-6582f2d099e8b-help">
            HTML,
            Search::widget()->ariaDescribedBy()->id('search-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->ariaDescribedBy(false)->id('search-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="search-', Search::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Search::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" hidden>
            HTML,
            Search::widget()->hidden()->id('search-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="search">
            HTML,
            Search::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" lang="value">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" name="value" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" placeholder="value">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->placeholder('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" readonly>
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testSize(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" size="1">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->size(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" style="value">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" tabindex="1">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" title="value">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search" value="value">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="FormModelName[property]" type="search">
            HTML,
            Search::widget()->fieldAttributes('FormModelName', 'property')->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" type="search">
            HTML,
            Search::widget()->fieldAttributes('FormModelName', 'property')->name(null)->render()
        );
    }
}
