<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\File;

use PHPForge\Html\FormControl\Input\File;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidateTest extends TestCase
{
    public function testAccept(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" accept="value">
            HTML,
            File::widget()->accept('value')->id('file-65a15e0439570')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="file-65a15e0439570" type="file" required>
            HTML,
            File::widget()->id('file-65a15e0439570')->required()->render()
        );
    }
}
