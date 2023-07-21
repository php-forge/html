<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Footer;

use PHPForge\Html\Footer;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<footer>test block</footer>', Footer::widget()->begin() . 'test block' . Footer::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <footer>
            test element
            </footer>
            HTML,
            Footer::widget()->content('test element')->render(),
        );
    }
}
