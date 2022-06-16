<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\Button;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class ButtonTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '', '<button type="button"></button>'],
            [['class' => 'class'], '', '<button type="button" class="class"></button>'],
            [[], 'Content', '<button type="button">Content</button>'],
            [['disabled' => true], '', '<button type="button" disabled></button>'],
            [
                ['download' => true, 'href' => '/images/myw3schoolsimage.jpg'],
                '',
                '<button type="button" href="/images/myw3schoolsimage.jpg" download></button>',
            ],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param array $attributes Tag attributes.
     * @param string $content Tag content.
     * @param string $expected Expected result.
     */
    public function testCreate(array $attributes, string $content, string $expected): void
    {
        $assert = new Assert();
        $button = new Button();
        $assert->equalsWithoutLE($expected, $button->create($attributes, $content));
    }
}
