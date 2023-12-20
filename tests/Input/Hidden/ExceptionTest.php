<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Hidden;

use InvalidArgumentException;
use PHPForge\Html\Input\Hidden;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testAriaDescribedby(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "aria-describedby" attribute.');

        Hidden::widget()->ariaDescribedby('test')->render();
    }

    public function testAriaLabel(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "aria-label" attribute.');

        Hidden::widget()->ariaLabel('test')->render();
    }

    public function testAutofocus(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "autofocus" attribute.');

        Hidden::widget()->autofocus()->render();
    }

    public function testDisabled(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "disabled" attribute.');

        Hidden::widget()->disabled()->render();
    }

    public function testHidden(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "hidden" attribute.');

        Hidden::widget()->hidden()->render();
    }

    public function testRequired(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "required" attribute.');

        Hidden::widget()->required()->render();
    }

    public function testReadonly(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "readonly" attribute.');

        Hidden::widget()->readonly()->render();
    }

    public function testTabindex(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "tabindex" attribute.');

        Hidden::widget()->tabindex(1)->render();
    }

    public function testTitle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must not be "title" attribute.');

        Hidden::widget()->title('test-title')->render();
    }

    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Hidden::class widget must be a string or null value.');

        Hidden::widget()->value([])->render();
    }
}
