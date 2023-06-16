<?php

declare(strict_types=1);

use Dhii\Services\Factories\Value;

return function (string $rootDir, string $mainFile): array {
    return [
        /**
         * @return string The theme's base directory
         */
        'redacre/test-a1/basedir' => new Value($rootDir),
    ];
};
