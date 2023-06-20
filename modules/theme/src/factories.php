<?php

declare(strict_types=1);

use Dhii\Services\Factories\StringService;
use Dhii\Services\Factories\Value;
use Dhii\Services\Factory;

return function (string $modDir): array {
    return [
        /**
         * @return string The theme's base directory
         */
        'redacre/test-a1/theme/basedir' => new Value($modDir),

        'redacre/test-a1/theme/blocks/dir' => new StringService('{0}/blocks', [
            'redacre/test-a1/theme/basedir',
        ]),

        'redacre/test-a1/theme/frontend/dir' => new StringService('{0}/frontend', [
            'redacre/test-a1/theme/basedir',
        ]),

        'redacre/test-a1/theme/frontend/srcdir' => new StringService('{0}/src', [
            'redacre/test-a1/theme/frontend/dir',
        ]),

        'redacre/test-a1/theme/assets/dir' => new StringService('{0}/dist', [
            'redacre/test-a1/theme/frontend/dir',
        ]),

        'redacre/test-a1/theme/assets/stylesheet_path' => new StringService('{0}/style.css', [
            'redacre/test-a1/theme/frontend/dir',
        ]),

        /**
         * A list of paths to block.json files.
         * Each path must end with `block.json`.
         *
         * @see https://github.com/WordPress/gutenberg/issues/25188#issuecomment-916109577
         * @return iterable<string>
         */
        'redacre/test-a1/theme/blocks/definitions' => new Factory([
            'redacre/test-a1/theme/blocks/dir',
        ], function (string $blocksDir): iterable {
            yield "$blocksDir/redacre-test-block.json";
        }),

        /**
         */
        'redacre/test-a1/theme/blocks/categories' => new Value([
            [
                'slug' => 'redacre',
                'title' => 'Red Acre',
                'icon' => null,
            ],
        ]),

        ###################################################
        # redacre/test-a1/theme/assets
        ###################################################

        'redacre/test-a1/theme/assets/version' => new Value('0.1.0'),
    ];
};
