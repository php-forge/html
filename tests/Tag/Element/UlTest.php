<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\Ul;
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
                ['0' => ['content' => 'Uno'], '1' => ['content' => 'Dos'], '2' => ['content' => 'Tres']],
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
                    '0' => ['content' => 'Uno', 'attributes' => ['Value' => '1']],
                    '1' => ['content' => 'Dos', 'attributes' => ['Value' => '2']],
                    '2' => ['content' => 'Tres', 'attributes' => ['Value' => '3']],
                ],
                <<<HTML
                <ul>
                <li Value="1">
                Uno
                </li>
                <li Value="2">
                Dos
                </li>
                <li Value="3">
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
        $ul = new Ul();
        $assert->equalsWithoutLE($expected, $ul->create($attributes, $items));
    }
}
