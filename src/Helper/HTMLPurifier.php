<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use HTMLPurifier_Config;

final class HTMLPurifier
{
    public static function purifyAndEscapeHTML($htmlContent): string
    {
        $config = HTMLPurifier_Config::createDefault();

        $purifier = new \HTMLPurifier($config);

        $def=$config->getHTMLDefinition(true);

        // Add the SVG allowed elements and attributes.

        $svg=$def->addElement(
            'svg',
            'Block',
            'Flow',
            'Common',
            [
                'version' => 'CDATA',
                'id' => 'CDATA',
                'xmlns' => 'CDATA',
                'width' => 'CDATA',
                'height' => 'CDATA',
                'xmlns:xlink' => 'CDATA',
                'x' => 'CDATA',
                'y' =>'CDATA',
                'viewBox' => 'CDATA',
                'enable-background' => 'CDATA',
                'xml:space'=>'CDATA',
            ]
        );
        $svg->excludes = ['svg' => true];

        $path=$def->addElement('path', 'Block', 'Flow', 'Common', ['fill'=>'CDATA','d'=>'CDATA']);
        $g=$def->addElement(
            'g',
            'Block',
            'Flow',
            'Common',
            ['fill'=>'CDATA','stroke'=>'CDATA','stroke-width'=>'CDATA'],
        );
        $polyline=$def->addElement(
            'polyline',
            'Block',
            'Flow',
            'Common',
            ['points' => 'CDATA']
        );
        $rect=$def->addElement(
            'rect',
            'Block',
            'Flow',
            'Common',
            [
                'x' => 'CDATA',
                'y' => 'CDATA',
                'width' => 'CDATA',
                'height' => 'CDATA',
            ],
        );
        $circle=$def->addElement(
            'circle',
            'Block',
            'Flow',
            'Common',
            [
                'cx' => 'CDATA',
                'cy' => 'CDATA',
                'r' => 'CDATA',
            ],
        );
        $def->addAttribute('a', 'target', 'Enum#_blank');

        $cleanContent = $purifier->purify($htmlContent);

        $escapedContent = preg_replace_callback('/[^<>&]+/', function($match) {
            return Encode::content($match[0]);
        }, $cleanContent);

        return $escapedContent;
    }
}
