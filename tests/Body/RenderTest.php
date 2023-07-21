<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Body;

use PHPForge\Html\Body;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<body>test block</body>', Body::widget()->begin() . 'test block' . Body::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            test element
            </body>
            HTML,
            Body::widget()->content('test element')->render(),
        );
    }
}
