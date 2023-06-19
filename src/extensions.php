<?php

declare(strict_types=1);

return function (): array {
    return [
        /**
         * Adds block definitions from other modules to `blocks` module
         */
        'redacre/blocks/definitions' => function (ContainerInterface $c, iterable $prev): iterable {
            $otherDefinitions = [
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
            ];

            foreach ($otherCategories as $category) {
                $prev = array_merge($prev, $category);
            }

            return $prev;
        },
    ];
};
