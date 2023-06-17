<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Core;

use Dhii\Container\ServiceProvider;
use Dhii\Modular\Module\ModuleInterface;
use Interop\Container\ServiceProviderInterface;
use Psr\Container\ContainerInterface;

class CoreModule implements ModuleInterface
{
    /**
     * @inheritDoc
     */
    public function setup(): ServiceProviderInterface
    {
        $srcDir = __DIR__;
        $rootDir = dirname($srcDir);

        return new ServiceProvider(
            (require "$srcDir/factories.php")($rootDir),
            (require "$srcDir/extensions.php")()
        );
    }

    /**
     * @inheritDoc
     */
    public function run(ContainerInterface $c): void
    {
        // Nothing to do
    }
}
