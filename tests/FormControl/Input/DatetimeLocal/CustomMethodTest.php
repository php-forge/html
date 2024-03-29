<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\DatetimeLocal;

use PHPForge\{Html\FormControl\Input\DatetimeLocal, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" name="ModelName[fieldName]" type="datetime-local">
            HTML,
            DateTimeLocal::widget()->generateField('ModelName', 'fieldName')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes([
                    'class' => 'value',
                ])
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <article>
            prefix
            </article>
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('article')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            suffix
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <div>
            suffix
            </div>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <div class="value">
            suffix
            </div>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes([
                    'class' => 'value',
                ])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <div class="value">
            suffix
            </div>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <article>
            suffix
            </article>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('article')
                ->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            </div>
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
