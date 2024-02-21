<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Textual\A;

use PHPForge\Html\Textual\A;
use PHPForge\Support\Assert;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends \PHPUnit\Framework\TestCase
{
    public function testAriaControls(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-controls="value"></a>
            HTML,
            A::widget()->ariaControls('value')->render()
        );
    }

    public function testAriaDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-disabled="value"></a>
            HTML,
            A::widget()->ariaDisabled('value')->render()
        );
    }

    public function testAriaExpanded(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-expanded="value"></a>
            HTML,
            A::widget()->ariaExpanded('value')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-label="value"></a>
            HTML,
            A::widget()->ariaLabel('value')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="value"></a>
            HTML,
            A::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a autofocus></a>
            HTML,
            A::widget()->autofocus()->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="value"></a>
            HTML,
            A::widget()->class('value')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a>value</a>
            HTML,
            A::widget()->content('value')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a data-value="value"></a>
            HTML,
            A::widget()->dataAttributes(['value' => 'value'])->render()
        );
    }

    public function testDownload(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a download></a>
            HTML,
            A::widget()->download()->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a hidden></a>
            HTML,
            A::widget()->hidden()->render()
        );
    }

    public function testHref(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a href="value"></a>
            HTML,
            A::widget()->href('value')->render()
        );
    }

    public function testHreflang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a hreflang="value"></a>
            HTML,
            A::widget()->hreflang('value')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a id="value"></a>
            HTML,
            A::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a lang="value"></a>
            HTML,
            A::widget()->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a name="value"></a>
            HTML,
            A::widget()->name('value')->render()
        );
    }

    public function testPing(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a ping="value"></a>
            HTML,
            A::widget()->ping('value')->render()
        );
    }

    public function testReferrerpolicy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a referrerpolicy="no-referrer"></a>
            HTML,
            A::widget()->referrerpolicy('no-referrer')->render()
        );
    }

    public function testRel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a rel="preload"></a>
            HTML,
            A::widget()->rel('preload')->render()
        );
    }

    public function testRole(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a role="value"></a>
            HTML,
            A::widget()->role('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a style="value"></a>
            HTML,
            A::widget()->style('value')->render()
        );
    }

    public function testTarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a target="_blank"></a>
            HTML,
            A::widget()->target('_blank')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a tabindex="1"></a>
            HTML,
            A::widget()->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a title="value"></a>
            HTML,
            A::widget()->title('value')->render()
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="value"></a>
            HTML,
            A::widget()->type('value')->render()
        );
    }
}
