<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Email;

use PHPForge\Html\Input\Email;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
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
            <input id="email-65a15e0439570" type="email" readonly>
            HTML,
            Email::widget()->id('email-65a15e0439570')->readOnly()->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            suffix
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div>
            suffix
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div class="value">
            suffix
            </div>
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div class="value">
            suffix
            </div>
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <span>suffix</span>
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('span')
                ->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="email-65a15e0439570" type="email">
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
