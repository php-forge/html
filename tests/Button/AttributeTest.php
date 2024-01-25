<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Button;

use PHPForge\Html\Button;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAriaControls(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-controls="value"></button>
            HTML,
            Button::widget()->ariaControls('value')->id('button-658716145f1d9')->render()
        );
    }

    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-describedby="value"></button>
            HTML,
            Button::widget()->ariaDescribedBy('value')->id('button-658716145f1d9')->render()
        );
    }

    public function testAriaDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" aria-disabled="value"></button>
            HTML,
            Button::widget()->ariaDisabled('value')->id('button-658716145f1d9')->render()
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
            <button id="button-658716145f1d9" type="button" aria-label="value"></button>
            HTML,
            Button::widget()->ariaLabel('value')->id('button-658716145f1d9')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="value" id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->attributes(['class' => 'value'])->id('button-658716145f1d9')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="value" id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->class('value')->id('button-658716145f1d9')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button">value</button>
            HTML,
            Button::widget()->content('value')->id('button-658716145f1d9')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" data-value="value"></button>
            HTML,
            Button::widget()->dataAttributes(['value' => 'value'])->id('button-658716145f1d9')->render()
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

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('<button id="button-', Button::widget()->render());
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="value" type="button"></button>
            HTML,
            Button::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" lang="value"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" name="value" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->name('value')->render()
        );
    }

    public function testRole(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" role="value"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->role('value')->render()
        );
    }

    public function testRoleWithLink(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a id="button-658716145f1d9" type="button" role="value"></a>
            HTML,
            Button::widget()->id('button-658716145f1d9')->role('value')->tagName('a')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" style="value"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->style('value')->render()
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

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button" title="value"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->title('value')->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button"></button>
            HTML,
            Button::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-658716145f1d9" type="button"></button>
            HTML,
            Button::widget()->id('button-658716145f1d9')->name(null)->render()
        );
    }
}
