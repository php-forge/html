<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\TextArea;

use PHPForge\Html\FormControl\TextArea;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidateTest extends TestCase
{
    public function testMaxLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" maxlength="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->maxLength(1)->render()
        );
    }

    public function testMinLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" minlength="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->minlength(1)->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" required></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->required()->render()
        );
    }
}
