<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\P;

use PHPForge\Html\P;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<p>test block</p>', P::widget()->begin() . 'test block' . P::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <p>
            test element
            </p>
            HTML,
            P::widget()->content('test element')->render(),
        );
    }
}
