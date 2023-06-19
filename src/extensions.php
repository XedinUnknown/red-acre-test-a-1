<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;

return function (): array {
    return [
        /**
         * Adds block definitions from other modules to `blocks` module
         */
        'redacre/blocks/definitions' => function (ContainerInterface $c, iterable $prev): iterable {
            $otherDefinitions = [
                $c->get('redacre/test-a1/theme/blocks/definitions'),
            ];

            yield from $prev;
            foreach ($otherDefinitions as $blockDefinition) {
                yield from $blockDefinition;
            }
        },

        /**
         * Adds block categories from other modules to `blocks` module
         */
        'redacre/blocks/categories' => function (ContainerInterface $c, array $prev): array {
            /** @var list<array> $otherCategories */
            $otherCategories = [
                $c->get('redacre/test-a1/theme/blocks/categories'),
            ];

            foreach ($otherCategories as $category) {
                $prev = array_merge($prev, $category);
            }

            return $prev;
        },
    ];
};
