<?php

declare(strict_types=1);

return function (string $rootDir, string $mainFile): array {
    return [
        'redacre/theme/basedir' => function () use ($rootDir): string {
            return $rootDir;
        },
    ];
};
