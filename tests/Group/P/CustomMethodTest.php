<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Group\P;

use PHPForge\Html\Group\P;
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
            <p>value</p>
            HTML,
            P::widget()->begin() . 'value' . P::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <p>
            </p>
            HTML,
            P::widget()->render(),
        );
    }
}
