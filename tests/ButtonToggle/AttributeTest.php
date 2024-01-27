<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonToggle;

use PHPForge\Html\ButtonToggle;
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
            <button id="button-toggle-658716145f1d9" type="button" aria-controls="value"></button>
            HTML,
            ButtonToggle::widget()->ariaControls(true)->dataValue('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-describedby="value"></button>
            HTML,
            ButtonToggle::widget()->ariaDescribedBy('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testAriaExpanded(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-expanded="value"></button>
            HTML,
            ButtonToggle::widget()->ariaExpanded('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-label="value"></button>
            HTML,
            ButtonToggle::widget()->ariaLabel('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="value" id="button-toggle-658716145f1d9" type="button"></button>
            HTML,
            ButtonToggle::widget()->attributes(['class' => 'value'])->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="value" id="button-toggle-658716145f1d9" type="button"></button>
            HTML,
            ButtonToggle::widget()->class('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button">
            value
            </button>
            HTML,
            ButtonToggle::widget()->content('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-value="value"></button>
            HTML,
            ButtonToggle::widget()->dataAttributes(['value' => 'value'])->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataBsAutoClose(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-bs-auto-close="value"></button>
            HTML,
            ButtonToggle::widget()->dataBsAutoClose('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataBsDismiss(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-bs-dismiss="value"></button>
            HTML,
            ButtonToggle::widget()->dataBsDismiss('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataBsTarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-bs-target="value"></button>
            HTML,
            ButtonToggle::widget()->dataBsTarget('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataBsTargetWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-bs-target="#value"></button>
            HTML,
            ButtonToggle::widget()
                ->dataBsTarget(true)
                ->dataValue('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testDataBsToggle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-bs-toggle="value"></button>
            HTML,
            ButtonToggle::widget()->dataBsToggle('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataCollapseToggle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-collapse-toggle="value"></button>
            HTML,
            ButtonToggle::widget()->dataCollapseToggle('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataDismissTarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-dismiss-target="value"></button>
            HTML,
            ButtonToggle::widget()->dataDismissTarget('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataDismissTargetWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-dismiss-target="value"></button>
            HTML,
            ButtonToggle::widget()
                ->dataDismissTarget(true)
                ->dataValue('value')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testDataDrawerTarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-drawer-target="value"></button>
            HTML,
            ButtonToggle::widget()->dataDrawerTarget('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataDrawerTargetWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-drawer-target="value"></button>
            HTML,
            ButtonToggle::widget()
                ->dataDrawerTarget(true)
                ->dataValue('value')
                ->id('button-toggle-658716145f1d9')
                ->toggleId('toggle-id')
                ->render()
        );
    }

    public function testDataDropdownToggle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-dropdown-toggle="value"></button>
            HTML,
            ButtonToggle::widget()->dataDropdownToggle('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataDropdownToggleWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-dropdown-toggle="value"></button>
            HTML,
            ButtonToggle::widget()
                ->dataDropdownToggle(true)
                ->dataValue('value')
                ->id('button-toggle-658716145f1d9')
                ->toggleId('toggle-id')
                ->render()
        );
    }

    public function testDataToggle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-toggle="value"></button>
            HTML,
            ButtonToggle::widget()->dataToggle('value')->id('button-toggle-658716145f1d9')->render()
        );
    }

    public function testDataToggleWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" data-toggle="value"></button>
            HTML,
            ButtonToggle::widget()
                ->dataToggle(true)
                ->dataValue('value')
                ->id('button-toggle-658716145f1d9')
                ->toggleId('toggle-id')
                ->render()
        );
    }
    
    public function testGenerateId(): void
    {
        $this->assertStringContainsString('<button id="button-toggle', ButtonToggle::widget()->render());
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="value" type="button"></button>
            HTML,
            ButtonToggle::widget()->id('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" name="value" type="button"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->name('value')->render()
        );
    }

    public function testRole(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a id="button-toggle-658716145f1d9" type="button" role="button"></a>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->link()->role('button')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" style="value"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" tabindex="1"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" title="value"></button>
            HTML,
            ButtonToggle::widget()->id('button-toggle-658716145f1d9')->title('value')->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button"></button>
            HTML,
            ButtonToggle::widget()->id(null)->render()
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
