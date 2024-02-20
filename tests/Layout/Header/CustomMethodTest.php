<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Header;

use PHPForge\Html\Layout\Header;
use PHPForge\Support\Assert;
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
            <header>value</header>
            HTML,
            Header::widget()->begin() . 'value' . Header::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header>
            </header>
            HTML,
            Header::widget()->render()
        );
    }
}
