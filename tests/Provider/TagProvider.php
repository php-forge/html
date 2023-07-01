<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Provider;

final class TagProvider
{
    public static function create(): array
    {
        return [
            [
                'article',
                '',
                ['id' => 'id-1', 'class' => 'class'],
                '<article class="class" id="id-1">' . PHP_EOL . '</article>',
            ],
            ['br', '', [], '<br>'],
            ['BR', '', [], '<br>'],
            ['hr', '', [], '<hr>'],
            ['HR', '', [], '<hr>'],
            ['div', 'Content', [], '<div>' . PHP_EOL . 'Content' . PHP_EOL . '</div>'],
            [
                'input',
                '',
                ['type' => 'text', 'name' => 'test', 'value' => '<>'],
                '<input name="test" type="text" value="&lt;&gt;">',
            ],
            ['span', '', [], '<span></span>'],
            ['span', '', ['disabled' => true], '<span disabled></span>'],
        ];
    }
}
