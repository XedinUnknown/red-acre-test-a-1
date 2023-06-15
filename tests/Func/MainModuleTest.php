<?php

declare(strict_types=1);

namespace RedAcre\Theme\Test\Func;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class MainModuleTest extends TestCase
{
    public function testMainModuleLoads()
    {
        $appContainer = $this->bootstrapModule();
        $this->assertInstanceOf(ContainerInterface::class, $appContainer);
        $this->assertTrue($appContainer->has('redacre/theme/basedir'));
        $this->assertFalse($appContainer->has(uniqid('non-existing-service')));
    }

    protected function bootstrapModule(): ContainerInterface
    {
        $rootDir = ROOT_DIR;
        $mainFile = "$rootDir/plugin.php";
        $bootstrap = require "$rootDir/inc/bootstrap.php";
        $appContainer = $bootstrap($rootDir, $mainFile);

        return $appContainer;
    }
}
