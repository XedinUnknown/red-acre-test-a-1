<?php

(function (string $mainFile): void {
    $rootDir = dirname($mainFile);
    $autoload = "$rootDir/vendor/autoload.php";

    if (file_exists($autoload)) {
        require $autoload;
    }

    add_action('after_setup_theme', function () use ($mainFile, $rootDir) {
        $incDir = "$rootDir/inc";
        $bootstrap = require "$incDir/bootstrap.php";

        $appContainer = $bootstrap($rootDir, $mainFile);
    });
})(__FILE__);
