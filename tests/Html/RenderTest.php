<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Html;

use PHPForge\Html\Html;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<html>test block</html>', Html::widget()->begin() . 'test block' . Html::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html>
            test element
            </html>
            HTML,
            Html::widget()->content('test element')->render(),
        );
    }
}
