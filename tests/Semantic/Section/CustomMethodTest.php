<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Semantic\Section;

use PHPForge\{Html\Semantic\Section, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBeginEnd(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <section>value</section>
            HTML,
            Section::widget()->begin() . 'value' . Section::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <section>
            </section>
            HTML,
            Section::widget()->render(),
        );
    }
}
