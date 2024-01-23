<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Provider;

final class AttributesProvider
{
    public static function dataRenderTagAttributes(): array
    {
        return [
            [
                ' checked disabled required="yes"',
                [
                    'checked' => true,
                    'disabled' => true,
                    'hidden' => false,
                    'required' => 'yes',
                ],
            ],
            [
                ' class="first second"', [
                    'class' => ['first', 'second'],
                ]],
            [
                '', [
                    'class' => [],
                ]],
            [
                ' style="width: 100px; height: 200px;"', [
                    'style' => [
                        'width' => '100px',
                        'height' => '200px',
                    ],
                ]],
            [
                ' name="position" value="42"', [
                    'value' => 42,
                    'name' => 'position',
                ]],
            [
                ' class="a b" id="x" data-a="1" data-b="2" style="width: 100px;" any=\'[1,2]\'',
                [
                    'id' => 'x',
                    'class' => ['a', 'b'],
                    'data' => [
                        'a' => 1,
                        'b' => 2,
                    ],
                    'style' => [
                        'width' => '100px',
                    ],
                    'any' => [1, 2],
                ],
            ],
            [
                ' data-a="0" data-b=\'[1,2]\' any="42"',
                [
                    'class' => [],
                    'style' => [],
                    'data' => [
                        'a' => 0,
                        'b' => [1, 2],
                    ],
                    'any' => 42,
                ],
            ],
            [
                ' data-foo=\'[]\'',
                [
                    'data' => [
                        'foo' => [],
                    ],
                ],
            ],
            [
                ' src="xyz" data-a="1" data-b="c"',
                [
                    'src' => 'xyz',
                    'data' => [
                        'a' => 1,
                        'b' => 'c',
                    ],
                ],
            ],
            [
                ' src="xyz" ng-a="1" ng-b="c"',
                [
                    'src' => 'xyz',
                    'ng' => [
                        'a' => 1,
                        'b' => 'c',
                    ],
                ],
            ],
            [
                ' src="xyz" data-ng-a="1" data-ng-b="c"',
                [
                    'src' => 'xyz',
                    'data-ng' => [
                        'a' => 1,
                        'b' => 'c',
                    ],
                ],
            ],
            [
                ' src="xyz" aria-a="1" aria-b="c"',
                [
                    'src' => 'xyz',
                    'aria' => [
                        'a' => 1,
                        'b' => 'c',
                    ],
                ],
            ],
            [
                '',
                [
                    'disabled' => null,
                ],
            ],
            [
                '',
                [
                    'value' => '',
                ],
            ],
            [
                '',
                [
                    '' => 'test-class',
                ],
            ],
        ];
    }
}
