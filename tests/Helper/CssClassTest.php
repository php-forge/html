<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use PHPForge\{Html\Helper\CssClass, Support\Assert};
use PHPUnit\Framework\TestCase;

final class CssClassTest extends TestCase
{
    public function testAddWithArray(): void
    {
        $attributes = [];

        CssClass::add($attributes, []);
        $this->assertSame([], $attributes);

        CssClass::add($attributes, ['test-class']);
        $this->assertSame([
            'class' => 'test-class',
        ], $attributes);

        CssClass::add($attributes, ['test-class']);
        $this->assertSame([
            'class' => 'test-class',
        ], $attributes);

        CssClass::add($attributes, ['test-class-1']);
        $this->assertSame([
            'class' => 'test-class test-class-1',
        ], $attributes);

        CssClass::add($attributes, ['test-class', 'test-class-1']);
        $this->assertSame([
            'class' => 'test-class test-class-1',
        ], $attributes);

        CssClass::add($attributes, ['test-class-2']);
        $this->assertSame([
            'class' => 'test-class test-class-1 test-class-2',
        ], $attributes);

        CssClass::add($attributes, ['test-override-class'], true);

        $this->assertSame([
            'class' => 'test-override-class',
        ], $attributes);
    }

    public function testAddMethodWithArrayClasses()
    {
        $attributes = [
            'class' => ['existing-class-1', 'existing-class-2'],
        ];

        CssClass::add($attributes, 'new-class');

        $this->assertSame('existing-class-1 existing-class-2 new-class', $attributes['class']);

        $attributes = [
            'class' => 'existing-class-1 existing-class-2',
        ];

        CssClass::add($attributes, 'new-class');

        $this->assertEquals('existing-class-1 existing-class-2 new-class', $attributes['class']);
    }

    public function testAddWithDefaultValueAttributesIsArray(): void
    {
        $attributes = [];

        CssClass::add($attributes, 'test-class');

        $this->assertSame('test-class', $attributes['class']);

        $attributes = [];

        CssClass::add($attributes, ['test-class-1', 'test-class-2']);

        $this->assertSame('test-class-1 test-class-2', $attributes['class']);
    }

    public function testAddDefaultValueAttributeExistClass(): void
    {
        $attributes = [
            'class' => 'existing-class',
        ];

        CssClass::add($attributes, 'new-class');

        $this->assertEquals('existing-class new-class', $attributes['class']);
    }

    public function testAddWithString(): void
    {
        $attributes = [];

        CssClass::add($attributes, '');
        $this->assertEmpty($attributes);

        CssClass::add($attributes, 'test-class');
        $this->assertSame([
            'class' => 'test-class',
        ], $attributes);

        CssClass::add($attributes, 'test-class');
        $this->assertSame([
            'class' => 'test-class',
        ], $attributes);

        CssClass::add($attributes, 'test-class-1');
        $this->assertSame([
            'class' => 'test-class test-class-1',
        ], $attributes);

        CssClass::add($attributes, 'test-class test-class-1');
        $this->assertSame([
            'class' => 'test-class test-class-1',
        ], $attributes);

        CssClass::add($attributes, 'test-class-2');
        $this->assertSame([
            'class' => 'test-class test-class-1 test-class-2',
        ], $attributes);

        CssClass::add($attributes, 'test-override-class', true);

        $this->assertSame([
            'class' => 'test-override-class',
        ], $attributes);
    }

    public function testMergeMethodAssignToKey()
    {
        $existingClasses = ['existing-class-1', 'existing-class-2'];
        $additionalClasses = [
            'keyed-class' => 'new-class',
        ];

        $merged = Assert::invokeMethod(new CssClass(), 'merge', [$existingClasses, $additionalClasses]);

        $this->assertArrayHasKey('keyed-class', $merged);
        $this->assertEquals('new-class', $merged['keyed-class']);
    }
}
