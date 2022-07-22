<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class HTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [1, [], '', '<h1>' . PHP_EOL . '</h1>'],
            [2, [], '', '<h2>' . PHP_EOL . '</h2>'],
            [3, [], '', '<h3>' . PHP_EOL . '</h3>'],
            [4, [], '', '<h4>' . PHP_EOL . '</h4>'],
            [5, [], '', '<h5>' . PHP_EOL . '</h5>'],
            [6, [], '', '<h6>' . PHP_EOL . '</h6>'],
            [1, ['class' => 'class'], '', '<h1 class="class">' . PHP_EOL . '</h1>'],
            [2, [], 'Content', '<h2>' . PHP_EOL . 'Content' . PHP_EOL . '</h2>'],
            [3, ['disabled' => true], '', '<h3 disabled>' . PHP_EOL . '</h3>'],
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
    public function testCreate(int $level, array $attributes, string $content, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE($expected, Tag::h($level, $attributes, $content));
    }

    public function testCreateException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The level must be between 1 and 6.');

        Tag::h(-1);
    }
}
