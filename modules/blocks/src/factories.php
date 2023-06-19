<?php

declare(strict_types=1);

use Dhii\Services\Factories\Value;

return function (string $modDir): array {
    return [
        /**
         * A list of paths to block.json files.
         * Each path must end with `block.json`.
         *
         * @see https://github.com/WordPress/gutenberg/issues/25188#issuecomment-916109577
         * @return iterable<string> A list of block definition file paths.
         */
        'redacre/blocks/definitions' => new Value([]),

        /**
         * A list of category definitions.
         * @see https://developer.wordpress.org/reference/hooks/block_categories_all/
         * @see https://developer.wordpress.org/reference/functions/get_default_block_categories/
         * @return array<{slug: string, title: string, icon?: string}> A list of category definitions.
         */
        'redacre/blocks/categories' => new Value([]),

    ];
};
