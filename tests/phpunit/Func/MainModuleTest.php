<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Test\Func;

use Psr\Container\ContainerInterface;
use RedAcre\TestA1\MainModule as Subject;
use RedAcre\TestA1\Test\AbstractModularTestCase;

class MainModuleTest extends AbstractModularTestCase
{
    public function testMainModuleLoads()
    {
        $appContainer = $this->bootstrapModules([new Subject(BASE_PATH, BASE_DIR)],[
            'redacre/test-a1/basedir' => BASE_DIR,
        ]);
        $this->assertInstanceOf(ContainerInterface::class, $appContainer);
        $this->assertTrue($appContainer->has('redacre/test-a1/basedir'));
        $this->assertFalse($appContainer->has(uniqid('non-existing-service')));
    }
}
