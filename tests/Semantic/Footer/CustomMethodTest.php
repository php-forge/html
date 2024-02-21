<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Semantic\Footer;

use PHPForge\Html\Semantic\Footer;
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
            <footer>value</footer>
            HTML,
            Footer::widget()->begin() . 'value' . Footer::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer>
            </footer>
            HTML,
            Footer::widget()->render()
        );
    }
}
