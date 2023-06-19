<?php

declare(strict_types=1);

use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factory;
use RedAcre\TestA1\AbsolutePathUrlResolver;

return function (): array {
    return [
        'redacre/test-a1/version' => new Factory([
            'redacre/test-a1/definition_file_path',
        ], function (string $definitionFilePath): string {
            $theme = wp_get_theme(basename(dirname($definitionFilePath)));
            $version = $theme->get('Version');

            return $version;
        }),

        'redacre/test-a1/baseurl' => new Factory([
            'redacre/test-a1/definition_file_path',
        ], function (string $definitionFilePath): string {
            $themesBaseUrl = get_theme_root_uri($definitionFilePath);
            $templateName = basename(dirname($definitionFilePath));

            return "$themesBaseUrl/$templateName";
        }),

        'redacre/test-a1/absolute_path_url_resolver' => new Constructor(AbsolutePathUrlResolver::class, [
            'redacre/test-a1/basedir',
            'redacre/test-a1/baseurl',
        ]),
    ];
};
