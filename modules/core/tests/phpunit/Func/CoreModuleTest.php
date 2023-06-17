<?php

declare(strict_types=1);


namespace RedAcre\TestA1\Core\Test\Func;

use RedAcre\TestA1\Test\AbstractModularTestCase;
use RedAcre\TestA1\Core\CoreModule as Subject;

class CoreModuleTest extends AbstractModularTestCase
{
    public function testBootstrap()
    {
        $this->expectNotToPerformAssertions();
        $container = $this->bootstrapModules([new Subject()]);
    }
}
