<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Footer;

use PHPForge\Html\Footer;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBeginEnd(): void
    {
        $this->assertSame('<footer>value</footer>', Footer::widget()->begin() . 'value' . Footer::end());
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer>
            </footer>
            HTML,
            Footer::widget()->render(),
        );
    }
}
