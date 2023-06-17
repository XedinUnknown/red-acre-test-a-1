<?php

use Dhii\Container\Dictionary;
use Dhii\Modular\Module\ModuleInterface;
use Interop\Container\ServiceProviderInterface;
use Psr\Container\ContainerInterface;
use RedAcre\TestA1\MainModule;

(function (string $basePath, string $wpRootPath): void {
    $baseDir = dirname($basePath);
    $srcDir = "$baseDir/src";
    $autoloadFilepath = "$baseDir/vendor/autoload.php";
    if (file_exists($autoloadFilepath)) {
        require $autoloadFilepath;
    }

    // Bootstrap the application as soon as all components are ready
    add_action('after_setup_theme', function () use ($basePath, $baseDir, $wpRootPath, $srcDir): void {
        $appModule = new MainModule($basePath, $baseDir);
        $modules = array_merge((require "$baseDir/src/modules.php")($basePath, $baseDir), [$appModule]);

        /**
         * Manipulate the list of this plugin's modules.
         *
         * @param array<ModuleInterface> $modules The list of plugin modules.
         */
        $modules = apply_filters('redacre_test-a1_modules', $modules);
        // Retrieve each module's service provider
        $providers = array_map(function(ModuleInterface $module): ServiceProviderInterface { return $module->setup(); }, $modules);

        /** @var callable(iterable<ServiceProviderInterface>, ?array<ContainerInterface>): ContainerInterface $bootstrap */
        $bootstrap = require "$baseDir/src/bootstrap.php";
        $container = $bootstrap($providers, [
            new Dictionary([
                'redacre/test-a1/main_file_path' => $basePath,
                'redacre/test-a1/basedir' => $baseDir,
                'wp/core/abspath' => $wpRootPath,
            ]),
        ]);

        // Run each module
        array_walk($modules, function(ModuleInterface $module) use ($container) { $module->run($container); });
    });
})(
    __FILE__,
    ABSPATH
);

