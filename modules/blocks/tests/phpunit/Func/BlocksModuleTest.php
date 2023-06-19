<?php

declare(strict_types=1);


namespace RedAcre\TestA1\Blocks\Test\Func;

use RedAcre\TestA1\Test\AbstractModularTestCase;
use RedAcre\TestA1\Blocks\BlocksModule as Subject;

class BlocksModuleTest extends AbstractModularTestCase
{
    public function testBootstrap()
    {
        $this->expectNotToPerformAssertions();
        $container = $this->bootstrapModules([new Subject()]);
    }
}
