<?php

declare(strict_types=1);


namespace RedAcre\TestA1;

use Dhii\Container\ServiceProvider;
use Dhii\Modular\Module\ModuleInterface;
use Interop\Container\ServiceProviderInterface;
use Psr\Container\ContainerInterface;

class MainModule implements ModuleInterface
{
    protected $pluginFilePath;
    protected $baseDir;

    /**
     * @param string $pluginFilePath Absolute path to the main plugin file.
     * @param string $baseDir Absolute path to the plugin base directory.
     */
    public function __construct(
        string $pluginFilePath,
        string $baseDir
    ) {
        $this->pluginFilePath = $pluginFilePath;
        $this->baseDir = $baseDir;
    }

    /**
     * @inheritDoc
     */
    public function setup(): ServiceProviderInterface
    {
        $srcDir = __DIR__;
        $rootDir = $this->baseDir;

        return new ServiceProvider(
            (require "$srcDir/factories.php")($this->pluginFilePath, $rootDir),
            (require "$srcDir/extensions.php")()
        );
    }

    /**
     * @inheritDoc
     */
    public function run(ContainerInterface $c): void
    {
    }
}
