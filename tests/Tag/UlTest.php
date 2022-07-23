<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class UlTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], [], '<ul>' . PHP_EOL . '</ul>'],
            [['class' => 'class'], [], '<ul class="class">' . PHP_EOL . '</ul>'],
            [
                [],
                [Tag::li([], 'Uno'), Tag::li([], 'Dos'), Tag::li([], 'Tres')],
                <<<HTML
                <ul>
                <li>
                Uno
                </li>
                <li>
                Dos
                </li>
                <li>
                Tres
                </li>
                </ul>
                HTML,
            ],
            [
                [],
                [
                    Tag::li(['value' => 1], 'Uno'),
                    Tag::li(['value' => 2], 'Dos'),
                    Tag::li(['value' => 3], 'Tres'),
                ],
                <<<HTML
                <ul>
                <li value="1">
                Uno
                </li>
                <li value="2">
                Dos
                </li>
                <li value="3">
                Tres
                </li>
                </ul>
                HTML,
            ],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param array $attributes Tag attributes.
     * @param array $items Tag li items.
     * @param string $expected Expected result.
     */
    public function testCreate(array $attributes, array $items, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE($expected, Tag::ul($attributes, $items));
    }
}
