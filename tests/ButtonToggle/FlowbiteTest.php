<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonToggle;

use PHPForge\Html\ButtonToggle;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FlowbiteTest extends TestCase
{
    public function testAlert(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" id="button-toggle-658716145f1d9" type="button" aria-label="Close" data-dismiss-target="id">
            <span class="sr-only">Close</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaLabel('Close')
                ->class('ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700')
                ->dataDismissTarget(true)
                ->id('button-toggle-658716145f1d9')
                ->iconFilePath(dirname(__DIR__, 2) . '/src/Base/Svg/toggle.svg')
                ->toggleClass('sr-only')
                ->toggleContent('Close')
                ->toggleId('id')
                ->render()
        );
    }

    public function testDropdown(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a id="button-toggle-658716145f1d9" type="button" role="role" data-dropdown-toggle="id">
            <span class="sr-only">Toggle dropdown</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </a>
            HTML,
            ButtonToggle::widget()
                ->dataDropdownToggle(true)
                ->icon(true)
                ->iconFilePath(dirname(__DIR__, 2) . '/src/Base/Svg/toggle.svg')
                ->id('button-toggle-658716145f1d9')
                ->link()
                ->role(true)
                ->toggleClass('sr-only')
                ->toggleContent('Toggle dropdown')
                ->toggleId('id')
                ->render()
        );
    }

    public function testSidebar(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button id="button-toggle-658716145f1d9" type="button" aria-controls="id" data-drawer-target="id" data-toggle="id">
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            ButtonToggle::widget()
                ->ariaControls(true)
                ->dataDrawerTarget(true)
                ->dataToggle(true)
                ->icon(true)
                ->iconFilePath(dirname(__DIR__, 2) . '/src/Base/Svg/toggle.svg')
                ->id('button-toggle-658716145f1d9')
                ->toggleClass('sr-only')
                ->toggleContent('Open sidebar')
                ->toggleId('id')
                ->render()
        );
    }
}
