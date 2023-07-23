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
             */
            $def->addElement(
                'svg',
                'Block',
                'Flow',
                'Common',
                [
                    'aria-hidden' => 'CDATA',
                    'enable-background' => 'CDATA',
                    'height' => 'CDATA',
                    'fill' => 'CDATA',
                    'id' => 'CDATA',
                    'version' => 'CDATA',
                    'viewbox' => 'CDATA',
                    'width' => 'CDATA',
                    'x' => 'CDATA',
                    'xml:space' => 'CDATA',
                    'xmlns' => 'CDATA',
                    'xmlns:xlink' => 'CDATA',
                    'y' => 'CDATA',
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
            $def->addElement(
                'path',
                'Block',
                'Flow',
                'Common',
                [
                    'clip-rule' => 'CDATA',
                    'd' => 'CDATA',
                    'fill' => 'CDATA',
                ],
            );
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
