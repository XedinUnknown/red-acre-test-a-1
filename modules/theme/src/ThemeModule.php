<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Theme;

use Dhii\Container\ServiceProvider;
use Dhii\Modular\Module\ModuleInterface;
use Interop\Container\ServiceProviderInterface;
use Psr\Container\ContainerInterface;
use RedAcre\TestA1\UrlResolverInterface;

/**
 * Responsible for theme functionality.
 */
class ThemeModule implements ModuleInterface
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
        /** @var string $assetVersion */
        $assetVersion = $c->get('redacre/test-a1/theme/assets/version');
        /** @var UrlResolverInterface $urlResolver */
        $urlResolver = $c->get('redacre/test-a1/theme/absolute_path_url_resolver');
        $modDir = $c->get('redacre/test-a1/theme/basedir');
        $assetPath = "$modDir/frontend/dist/redacre-test-block.js";
        $runtimePath = "$modDir/frontend/dist/runtime.js";
        $assetUrl = $urlResolver->resolveUrl($assetPath);
        $runtimeUrl = $urlResolver->resolveUrl($runtimePath);
        $registerScripts = function () use ($assetUrl, $runtimeUrl, $assetVersion): void {
            wp_register_script(
                'redacre-test-a1-encore-runtime',
                $runtimeUrl,
                ['wp-block-editor', 'wp-blocks', 'wp-element'],
                $assetVersion
            );
            wp_register_script(
                'block-redacre-test-editor-script',
                $assetUrl,
                [
                    'redacre-test-a1-encore-runtime',
                ],
                $assetVersion
            );
        };
        add_action('wp_enqueue_scripts', $registerScripts);
        add_action('admin_enqueue_scripts', $registerScripts);
    }
}
