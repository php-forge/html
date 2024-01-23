<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use PHPForge\Html\Input\Url;
use PHPUnit\Framework\TestCase;

final class Methods extends TestCase
{
    public function testPrintMethods(): void
    {
        $methods = get_class_methods(Url::class);

        sort($methods);
        var_dump(implode("\n", $methods));
        die;
    }
}
