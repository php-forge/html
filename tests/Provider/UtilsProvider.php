<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Provider;

final class UtilsProvider
{
    public static function dataGetInputName(): array
    {
        return [
            ['TestForm', '[0]content', 'TestForm[0][content]'],
            ['TestForm', 'dates[0]', 'TestForm[dates][0]'],
            ['TestForm', '[0]dates[0]', 'TestForm[0][dates][0]'],
            ['TestForm', 'age', 'TestForm[age]'],
            ['', 'dates[0]', 'dates[0]'],
            ['', 'age', 'age'],
        ];
    }

    public static function normalizeRegexpPattern(): array
    {
        return [
            ['', '//'],
            ['.*', '/.*/'],
            ['([a-z0-9-]+)', '/([a-z0-9-]+)/Ugimex'],
            ['([a-z0-9-]+)', '~([a-z0-9-]+)~Ugimex'],
            ['([a-z0-9-]+)', '~([a-z0-9-]+)~Ugimex', '~'],
            ['\u1F596([a-z])', '/\x{1F596}([a-z])/i'],
        ];
    }

    public static function normalizeRegexpPatternInvalid(): array
    {
        return [
            ['', 'The length of the regular expression cannot be less than 2.'],
            ['*', 'The length of the regular expression cannot be less than 2.'],
            ['.*', 'Incorrect regular expression.'],
            ['/.*', 'Incorrect regular expression.'],
            ['([a-z0-9-]+)', 'Incorrect regular expression.'],
            ['/.*/i', 'Incorrect regular expression.', '~'],
            ['/.*/i', 'Incorrect delimiter.', '//'],
            ['/~~/i', 'Incorrect delimiter.', '~~'],
        ];
    }
}
