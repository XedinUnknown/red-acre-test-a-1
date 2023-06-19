<?php

declare(strict_types=1);

use RedAcre\TestA1\Blocks\BlocksModule;

return function (string $rootDir, string $mainFile): iterable {
    $modules = [
        new BlocksModule(),
    ];

    return $modules;
};
