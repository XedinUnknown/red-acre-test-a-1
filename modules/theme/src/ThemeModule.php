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
        /** @var string $stylesheetPath */
        $stylesheetPath = $c->get('redacre/test-a1/theme/assets/stylesheet_path');
        $assetPath = "$modDir/frontend/dist/redacre-test-block.js";
        $runtimePath = "$modDir/frontend/dist/runtime.js";
        $assetUrl = $urlResolver->resolveUrl($assetPath);
        $runtimeUrl = $urlResolver->resolveUrl($runtimePath);
        $stylesheetUrl = $urlResolver->resolveUrl($stylesheetPath);
        $registerScripts = function () use ($assetUrl, $runtimeUrl, $stylesheetUrl, $assetVersion): void {
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

            wp_enqueue_style(
                'redacre-test-a1-styles',
                $stylesheetUrl,
                [],
                $assetVersion
            );

            wp_enqueue_style(
                'redacre-test-a1-google-font-dongle',
                'https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&display=swap'
            );

            wp_enqueue_style(
                'redacre-test-a1-google-font-inter',
                'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap'
            );
        };
        add_action('enqueue_block_assets', $registerScripts);
    }
}
