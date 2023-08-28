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
    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="test-class" type="button" aria-controls="id" aria-expanded="false" data-collapse-toggle="id">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()->class('test-class')->id('id')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button name="test-toggle" type="button" aria-controls="id" aria-expanded="false" data-collapse-toggle="id">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()->id('id')->name('test-toggle')->render(),
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="test-class" type="button" aria-controls="id" aria-expanded="false" data-collapse-toggle="id">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()->class('test-class')->id('id')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button" aria-controls="id" aria-expanded="false" style="color:red;" data-collapse-toggle="id">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()->style('color:red;')->id('id')->render(),
        );
    }

    public function testToggleAlert(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button" aria-label="Close" data-dismiss-target="id">
            <span class="sr-only">Close</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()->alert()->id('id')->render(),
        );
    }

    public function testToggleAlertContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button" aria-label="Close" data-dismiss-target="id">
            test-content
            </button>
            HTML,
            ButtonToggle::widget()->alert()->content('test-content')->id('id')->render(),
        );
    }

    public function testToggleAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="test-class" type="button" aria-controls="id" aria-expanded="false" data-drawer-target="id" data-drawer-toggle="id" data-collapse-toggle="id">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()
                ->attributes(['data-drawer-target' => 'id', 'data-drawer-toggle' => 'id'])
                ->class('test-class')
                ->id('id')
                ->render(),
        );
    }

    public function testToggleContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button" aria-controls="id" aria-expanded="false" data-collapse-toggle="id">
            test-content
            </button>
            HTML,
            ButtonToggle::widget()->content('test-content')->id('id')->render(),
        );
    }

    public function testToggleSidebar(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button" aria-controls="id" data-drawer-target="id" data-drawer-toggle="id">
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()->id('id')->sidebar()->render(),
        );
    }

    public function testToggleSidebarContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button" aria-controls="id" data-drawer-target="id" data-drawer-toggle="id">
            test-content
            </button>
            HTML,
            ButtonToggle::widget()->content('test-content')->id('id')->sidebar()->render(),
        );
    }
}
