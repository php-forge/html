<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class UlTest extends TestCase
{
    public function testCreate(): void
    {
        $this->ul = new Ul();
        $this->assertSame('<ul></ul>', $this->ul->create());
        $this->assertSame('<ul class="class"></ul>', $this->ul->create(['class' => 'class']));
    }

    public function testItems(): void
    {
        $this->assert = new Assert();
        $this->ul = new Ul();
        $this->assert->equalsWithoutLE(
            <<<HTML
            <ul>
            <li>Uno</li>
            <li>Dos</li>
            <li>Tres</li>
            </ul>
            HTML,
            $this->ul->create(
                [],
                ['0' => ['content' => 'Uno'], '1' => ['content' => 'Dos'], '2' => ['content' => 'Tres']],
            )
        );
    }

    public function testItemsWithAttributes(): void
    {
        $this->assert = new Assert();
        $this->ul = new Ul();
        $this->assert->equalsWithoutLE(
            <<<HTML
            <ul>
            <li Value="1">Uno</li>
            <li Value="2">Dos</li>
            <li Value="3">Tres</li>
            </ul>
            HTML,
            $this->ul->create(
                [],
                [
                    '0' => ['content' => 'Uno', 'attributes' => ['Value' => '1']],
                    '1' => ['content' => 'Dos', 'attributes' => ['Value' => '2']],
                    '2' => ['content' => 'Tres', 'attributes' => ['Value' => '3']],
                ],
            )
        );
    }
}
