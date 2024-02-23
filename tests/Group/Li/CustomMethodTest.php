<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Group\Li;

use PHPForge\{Html\Group\Li, Html\Group\Ul, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li>
            </li>
            HTML,
            Li::widget()->render()
        );
    }

    public function testRenderWithNested(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li>
            <ul>
            <li>
            Item 1
            </li>
            <li>
            Item 2
            </li>
            </ul>
            </li>
            HTML,
            Li::widget()->content(
                Ul::widget()->content(
                    Li::widget()->content('Item 1'),
                    Li::widget()->content('Item 2')
                )
            )
            ->render()
        );
    }
}
