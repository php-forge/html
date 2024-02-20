<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Grouping\Ul;

use PHPForge\Html\Grouping\{Li, Ul};
use PHPForge\Support\Assert;
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
            <ul>
            </ul>
            HTML,
            Ul::widget()->render()
        );
    }

    public function testRenderWithNested(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul>
            <li>
            Item 1
            <ul>
            <li>
            Item 1.1
            </li>
            <li>
            Item 1.2
            </li>
            </ul>
            </li>
            <li>
            Item 2
            </li>
            </ul>
            HTML,
            Ul::widget()
                ->content(
                    Li::widget()
                        ->content(
                            'Item 1',
                            Ul::widget()
                                ->content(
                                    Li::widget()->content('Item 1.1'),
                                    Li::widget()->content('Item 1.2'),
                                ),
                        ),
                    Li::widget()->content('Item 2'),
                )
                ->render(),
        );
    }
}
