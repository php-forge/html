<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Body;

use PHPForge\Html\Body;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBeginEnd(): void
    {
        $this->assertSame('<body>value</body>', Body::widget()->begin() . 'value' . Body::end());
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            </body>
            HTML,
            Body::widget()->render(),
        );
    }
}
