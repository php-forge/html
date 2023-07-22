<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;
use PhpCsFixer\Fixer\ClassNotation\OrderedTraitsFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;

return function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ]
    );

    // this way you add a single rule
    $ecsConfig->rules(
        [
            OrderedClassElementsFixer::class,
            OrderedTraitsFixer::class,
            NoUnusedImportsFixer::class,
        ]
    );

    // this way you can add sets - group of rules
    $ecsConfig->sets(
        [
            // run and fix, one by one
            SetList::DOCBLOCK,
            SetList::NAMESPACES,
            SetList::COMMENTS,
            SetList::PSR_12,
        ]
    );
};
