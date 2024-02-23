<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Group\Main;

use PHPForge\{Html\Group\Main, Support\Assert};
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
            <main>value</main>
            HTML,
            Main::widget()->begin() . 'value' . Main::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <main>
            </main>
            HTML,
            Main::widget()->render()
        );
    }
}
