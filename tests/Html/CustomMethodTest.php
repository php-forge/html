<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Html;

use PHPForge\Html\Html;
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
            <html>value</html>
            HTML,
            Html::widget()->begin() . 'value' . Html::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <html>
            </html>
            HTML,
            Html::widget()->render()
        );
    }
}
