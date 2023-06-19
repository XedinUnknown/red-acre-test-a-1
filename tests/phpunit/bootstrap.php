<?php

declare(strict_types=1);

(function (string $baseFile) {
    $baseDir = dirname($baseFile);
    $rootDir = dirname($baseDir, 2);
    define('BASE_DIR', $rootDir);
    define('BASE_PATH', "$rootDir/functions.php");

    error_reporting(E_ALL | E_STRICT);

    require_once "$rootDir/vendor/autoload.php";
})(__FILE__);
