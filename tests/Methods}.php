<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use PHPForge\Html\Input\Email;
use PHPForge\Html\Input\File;
use PHPForge\Html\Input\Image;
use PHPUnit\Framework\TestCase;

final class MethodsTest extends TestCase
{
    public function testPrintMethods(): void
    {
        $methods = get_class_methods(Image::class);
        sort($methods);
        var_dump(implode("\n", $methods));
        die();
    }
}
