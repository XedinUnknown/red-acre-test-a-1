<?php

use RedAcre\TestA1\Blocks\BlocksModule;
use RedAcre\TestA1\Core\CoreModule;
use RedAcre\TestA1\Theme\ThemeModule;

return function (string $rootDir, string $mainFile): iterable {
    $modules = [
        new CoreModule(),
        new BlocksModule(),
        new ThemeModule(),
    ];

    return $modules;
};
