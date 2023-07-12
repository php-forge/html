<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use PHPForge\Html\Helper\CssClass;
use PHPUnit\Framework\TestCase;

final class CssClassTest extends TestCase
{
    public function testAdd(): void
    {
        $attributes = [];

        CssClass::add($attributes, '');
        $this->assertSame([], $attributes);

        CssClass::add($attributes, []);
        $this->assertSame([], $attributes);

        CssClass::add($attributes, 'class');
        $this->assertSame(['class' => 'class'], $attributes);

        CssClass::add($attributes, 'class');
        $this->assertSame(['class' => 'class'], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        CssClass::add($attributes, 'class');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        CssClass::add($attributes, 'class-2');
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);

        $attributes = ['class' => ['class']];

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => ['class', 'class-1']], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => ['class', 'class-1']], $attributes);

        CssClass::add($attributes, 'class-2');
        $this->assertSame(['class' => ['class', 'class-1', 'class-2']], $attributes);

        $attributes = ['class' => 'class'];

        CssClass::add($attributes, ['class-1', 'class-2']);
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);
    }

    public function testDuplicate(): void
    {
        $attributes = ['class' => ['test-class']];

        CssClass::add($attributes, 'class1');
        CssClass::add($attributes, 'class2');
        CssClass::add($attributes, 'test-class');

        $this->assertSame(['class' => ['test-class', 'class1', 'class2']], $attributes);
    }

    /**
     * @depends testAdd
     */
    public function testMerge(): void
    {
        $attributes = ['class' => ['persistent' => 'class-1']];

        CssClass::add($attributes, ['persistent' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1'], $attributes['class']);

        CssClass::add($attributes, ['additional' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1', 'additional' => 'class-2'], $attributes['class']);

        CssClass::add($attributes, ['persistent' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1', 'additional' => 'class-2'], $attributes['class']);
    }
}
