<?php

declare(strict_types=1);

use Dhii\Services\Factories\Value;

return function (string $rootDir, string $mainFile): array {
    return [
        'redacre/theme/basedir' => new Value($rootDir),
    ];
};
