<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use PHPForge\Html\Select;

final class Method extends \PHPUnit\Framework\TestCase
{
    public function test(): void
    {
        $methods = get_class_methods(Select::class);

        sort($methods);
        var_dump(implode("\n", $methods));
        die;
    }
}
