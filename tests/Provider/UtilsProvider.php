<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Provider;

final class UtilsProvider
{
    public static function dataGetInputName(): array
    {
        return [
            // arrayable false
            ['TestForm', '[0]content', false, 'TestForm[0][content]'],
            ['TestForm', 'dates[0]', false, 'TestForm[dates][0]'],
            ['TestForm', '[0]dates[0]', false, 'TestForm[0][dates][0]'],
            ['TestForm', 'age', false, 'TestForm[age]'],
            ['', 'dates[0]', false, 'dates[0]'],
            ['', 'age', false, 'age'],
            // arrayable true
            ['TestForm', 'content', true, 'TestForm[content][]'],
            ['TestForm', 'dates[0]', true, 'TestForm[dates][0][]'],
            ['TestForm', '[0]dates[0]', true, 'TestForm[0][dates][0][]'],
            ['TestForm', 'age', true, 'TestForm[age][]'],
            ['', 'dates[0]', true, 'dates[0][]'],
            ['', 'age', true, 'age[]'],
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
