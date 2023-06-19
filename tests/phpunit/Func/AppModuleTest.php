<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Test\Func;

use Psr\Container\ContainerInterface;
use RedAcre\TestA1\Test\AbstractApplicationTestCase;

class AppModuleTest extends AbstractApplicationTestCase
{
    public function testInitializationAndExtension()
    {
        {
            $serviceName = uniqid('serviceName');
            $factoryValue = uniqid('serviceValue');
            $extensionValue = uniqid('extensionValue');
            $valueSeparator = '/';

            $container = $this->bootstrapApplication(
                [
                    'redacre/test-a1/basedir' => function () {
                        return BASE_DIR;
                    },
                    'redacre/test-a1/definition_file_path' => function () {
                        return BASE_DIR . '/style.css';
                    },

                    $serviceName => function () use ($factoryValue): string {
                        return $factoryValue;
                    },
                ],
                [
                    $serviceName => function (ContainerInterface $c, string $prev) use ($extensionValue, $valueSeparator): string {
                        return "{$prev}{$valueSeparator}{$extensionValue}";
                    },
                ]
            );
        }

        {
            $serviceValue = $container->get($serviceName);
            $this->assertEquals("{$factoryValue}{$valueSeparator}{$extensionValue}", $serviceValue);
        }
    }
}
