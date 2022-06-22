<?php

declare(strict_types=1);

namespace Forge\Html\Helper;

use function strtr;

final class Utils
{
    public static function generateArrayableName(string $name): string
    {
        return substr($name, -2) !== '[]' ? $name . '[]' : $name;
    }
}
