<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use HTMLPurifier_Config;

final class HTMLPurifier
{
    public static function purifyAndEscapeHTML(string $htmlContent): string
    {
        $config = HTMLPurifier_Config::createDefault();

        $purifier = new \HTMLPurifier($config);

        $def = $config->getHTMLDefinition(true);

        $cleanContent = '';

        if ($def !== null) {
            /**
             * Add the SVG allowed elements and attributes.
             *
             * @var \HTMLPurifier_ElementDef $svg
             */
            $svg = $def->addElement(
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
                    'y' => 'CDATA',
                    'viewBox' => 'CDATA',
                    'enable-background' => 'CDATA',
                    'xml:space' => 'CDATA',
                ]
            );
            $def->addAttribute('a', 'target', 'Enum#_blank');
            $def->addElement(
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
            $def->addElement(
                'g',
                'Block',
                'Flow',
                'Common',
                [
                    'fill' => 'CDATA',
                    'stroke' => 'CDATA',
                    'stroke-width' => 'CDATA',
                    'transform' => 'CDATA',
                ],
            );
            $def->addElement('path', 'Block', 'Flow', 'Common', ['d' => 'CDATA', 'fill' => 'CDATA', ]);
            $def->addElement(
                'polyline',
                'Block',
                'Flow',
                'Common',
                [
                    'points' => 'CDATA',
                    'style' => 'CDATA',
                ],
            );
            $def->addElement(
                'rect',
                'Block',
                'Flow',
                'Common',
                [
                    'x' => 'CDATA',
                    'y' => 'CDATA',
                    'width' => 'CDATA',
                    'height' => 'CDATA',
                    'style' => 'CDATA',
                ],
            );

            $cleanContent = $purifier->purify($htmlContent);
        }

        $escapedContent = preg_replace_callback(
            '/[^<>&]+/',
            static fn ($match) => Encode::content($match[0]),
            $cleanContent,
        );

        return $escapedContent;
    }
}
