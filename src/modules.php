<?php

declare(strict_types=1);

use RedAcre\TestA1\Blocks\BlocksModule;
use RedAcre\TestA1\Theme\ThemeModule;

return function (string $rootDir, string $mainFile): iterable {
    $modules = [
        new BlocksModule(),
        new ThemeModule(),
    ];

    return $modules;
};
