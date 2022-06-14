<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Form;

use Forge\Html\Tag\Form\Input;
use PHPUnit\Framework\TestCase;

final class InputTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [null, [], '<input>'],
            ['text', [], '<input type="text">'],
            ['text', ['name' => 'name'], '<input name="name" type="text">'],
            ['text', ['name' => 'name', 'value' => 'value'], '<input name="name" type="text" value="value">'],
            [
                'text',
                ['class' => 'class', 'name' => 'name', 'value' => 'value'],
                '<input class="class" name="name" type="text" value="value">'
            ],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param string|null $type Input type.
     * @param array $attributes Input attributes.
     * @param string $expected Expected HTML.
     */
    public function testCreate(string $type = null, array $attributes = [], string $expected = ''): void
    {
        $input = new Input();
        $this->assertSame($expected, $input->create($type, $attributes));
    }
}
