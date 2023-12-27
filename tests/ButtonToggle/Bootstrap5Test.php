<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonToggle;

use PHPForge\Html\ButtonToggle;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class Bootstrap5Test extends TestCase
{
    public function testAccordion(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="accordion-button" id="button-toggle-658716145f1d9" type="button" aria-expanded="true" data-bs-toggle="collapse" aria-controls="button-toggle-658716145f1d9" data-bs-target="#button-toggle-658716145f1d9">
            Accordion item #1
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaControls(true)
                ->ariaExpanded('true')
                ->class('accordion-button')
                ->content('Accordion item #1')
                ->dataBsToggle('collapse')
                ->dataBsTarget(true)
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testAlert(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-label="Close" data-dismiss-target="button-toggle-658716145f1d9"></button>
            HTML,
            ButtonToggle::widget()
                ->ariaLabel('Close')
                ->dataDismissTarget(true)
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testDropdown(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="btn btn-secondary dropdown-toggle" id="button-toggle-658716145f1d9" type="button" aria-expanded="false" data-bs-toggle="dropdown">
            Dropdown button
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-secondary dropdown-toggle')
                ->content('Dropdown button')
                ->dataBsToggle('dropdown')
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testDropdownAutoCloseWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-auto-close="false" data-bs-toggle="dropdown">
            Manual close
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-secondary dropdown-toggle')
                ->content('Manual close')
                ->dataBsAutoClose('false')
                ->dataBsToggle('dropdown')
                ->id(null)
                ->render()
        );
    }

    public function testDropdownAutoCloseWithInside(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-auto-close="inside" data-bs-toggle="dropdown">
            Clickable inside
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-secondary dropdown-toggle')
                ->content('Clickable inside')
                ->dataBsAutoClose('inside')
                ->dataBsToggle('dropdown')
                ->id(null)
                ->render()
        );
    }

    public function testDropdownAutoCloseWithOutside(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-auto-close="outside" data-bs-toggle="dropdown">
            Clickable outside
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-secondary dropdown-toggle')
                ->content('Clickable outside')
                ->dataBsAutoClose('outside')
                ->dataBsToggle('dropdown')
                ->id(null)
                ->render()
        );
    }

    public function testDropdownAutoCloseWithTrue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-auto-close="true" data-bs-toggle="dropdown">
            Default dropdown
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-secondary dropdown-toggle')
                ->content('Default dropdown')
                ->dataBsAutoClose('true')
                ->dataBsToggle('dropdown')
                ->id(null)
                ->render()
        );
    }

    public function testDropdownLink(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="btn btn-secondary dropdown-toggle" id="button-toggle-658716145f1d9" type="button" aria-expanded="false" data-bs-toggle="dropdown">
            Dropdown button
            </a>
            HTML,
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-secondary dropdown-toggle')
                ->content('Dropdown button')
                ->dataBsToggle('dropdown')
                ->link()
                ->id('button-toggle-658716145f1d9')
                ->render()
        );
    }

    public function testDropdownSplit(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="btn btn-danger" type="button">
            Action
            </button>
            <button class="btn btn-danger dropdown-toggle dropdown-toggle-split" type="button" aria-expanded="false" data-bs-toggle="dropdown">
            <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->class('btn btn-danger')
                ->content('Action')
                ->id(null)
                ->render() . PHP_EOL .
            ButtonToggle::widget()
                ->ariaExpanded('false')
                ->class('btn btn-danger dropdown-toggle dropdown-toggle-split')
                ->dataBsToggle('dropdown')
                ->id(null)
                ->toggleClass('visually-hidden')
                ->toggleContent('Toggle Dropdown')
                ->render()
        );
    }

    public function testNavBar(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="navbar-toggler" id="button-toggle-658716145f1d9" type="button" aria-expanded="false" aria-label="Toggle navigation" data-bs-toggle="collapse" aria-controls="button-toggle-658716145f1d9" data-bs-target="#button-toggle-658716145f1d9">
            <span class="navbar-toggler-icon"></span>
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaControls(true)
                ->ariaExpanded('false')
                ->ariaLabel('Toggle navigation')
                ->class('navbar-toggler')
                ->dataBsToggle('collapse')
                ->dataBsTarget(true)
                ->id('button-toggle-658716145f1d9')
                ->toggleClass('navbar-toggler-icon')
                ->render()
        );
    }
}
