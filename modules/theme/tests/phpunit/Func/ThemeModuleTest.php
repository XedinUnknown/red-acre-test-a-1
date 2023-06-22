<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Theme\Test\Func;

use OutOfBoundsException;
use RedAcre\TestA1\Test\AbstractModularTestCase;
use RedAcre\TestA1\Theme\ThemeModule as Subject;
use RedAcre\TestA1\UrlResolverInterface;

class ThemeModuleTest extends AbstractModularTestCase
{
    public function testBootstrap()
    {
        $this->expectNotToPerformAssertions();
        $container = $this->bootstrapModules([new Subject()], [
            'redacre/test-a1/theme/absolute_path_url_resolver' => function () {
                $mock = $this->getMockBuilder(UrlResolverInterface::class)
                    ->onlyMethods([
                        'resolveUrl',
                    ])
                    ->getMock();
                $mock->method('resolveUrl')
                    ->will($this->returnCallback(function (string $path): string {
                        $rootPath = '/var/www/html';
                        $baseUrl = 'http://example.com/';

                        // Path relative to application root
                        if (substr($path, 0, 1) === '/') {
                            $path = "$rootPath/$path";
                        }

                        if (substr($path, 0, strlen($rootPath)) !== $rootPath) {
                            throw new OutOfBoundsException(sprintf('Path "%1$s" is not within root path "%2$s"', $path, $rootPath));
                        }

                        return str_replace($rootPath, $baseUrl, $path);
                    }));

                return $mock;
            },
        ]);
    }
}
