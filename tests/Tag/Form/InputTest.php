<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Form;

use Forge\Html\Tag\Form\Input;
use PHPUnit\Framework\TestCase;

final class InputTest extends TestCase
{
    public function testCreate(): void
    {
        $this->input = new Input();
        $this->assertSame('<input>', $this->input->create());
        $this->assertSame('<input type="text">', $this->input->create('text'));
        $this->assertSame('<input type="text" name="name">', $this->input->create('text', 'name'));
        $this->assertSame(
            '<input type="text" name="name" value="value">',
            $this->input->create('text', 'name', 'value'),
        );
        $this->assertSame(
            '<input type="text" class="class" name="name" value="value">',
            $this->input->create('text', 'name', 'value', ['class' => 'class']),
        );
    }
}
