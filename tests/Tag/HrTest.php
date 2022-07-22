<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class HrTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '<hr>'],
            [['class' => 'class'], '<hr class="class">'],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param int $level Tag level.
     * @param array $attributes Tag attributes.
     * @param string $content Tag content.
     * @param string $expected Expected result.
     */
    public function testCreate(array $attributes, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE($expected, Tag::hr($attributes));
    }
}
