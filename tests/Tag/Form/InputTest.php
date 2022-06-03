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
            [null, null, null, [], '<input>'],
            ['text', null, null, [], '<input type="text">'],
            ['text', 'name', null, [], '<input name="name" type="text">'],
            ['text', 'name', 'value', [], '<input name="name" type="text" value="value">'],
            [
                'text',
                'name',
                'value',
                ['class' => 'class'],
                '<input class="class" name="name" type="text" value="value">',
            ],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param string|null $type Input type.
     * @param string|null $name Input name.
     * @param string|null $value Input value.
     * @param array $attributes Input attributes.
     */
    public function testCreate(
        string $type = null,
        string $name = null,
        mixed $value = null,
        array $attributes = [],
        string $expected = ''
    ): void {
        $input = new Input();
        $this->assertSame($expected, $input->create($type, $name, $value, $attributes));
    }
}
