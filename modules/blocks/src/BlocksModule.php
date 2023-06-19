<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Blocks;

use Dhii\Container\ServiceProvider;
use Dhii\Modular\Module\ModuleInterface;
use Interop\Container\ServiceProviderInterface;
use Psr\Container\ContainerInterface;
use RuntimeException;

/**
 * Generic block-related functionality.
 *
 * @psalm-type BlockCategory = array{
 *  slug: string,
 *  title: string,
 *  icon?: string
 * }
 */
class BlocksModule implements ModuleInterface
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
        /** @var array<BlockCategory> $categories */
        $categories = $c->get('redacre/blocks/categories');
        $this->registerBlockCategories($categories);

        /** @var string[] $definitions */
        $definitions = $c->get('redacre/blocks/definitions');
        $this->registerBlockTypeDefinitions($definitions);
    }

    /**
     * Registers a block type from its definition file.
     *
     * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/
     * @param iterable<string> $filePaths A list of `block.json` filepaths.
     * @throws RuntimeException If problem registering.
     */
    protected function registerBlockTypeDefinitions(iterable $filePaths): void
    {
        foreach ($filePaths as $definitionPath) {
            if (register_block_type($definitionPath) === false) {
                throw new RuntimeException(sprintf(
                    'Could not register block type from definition "%1$s"',
                    $definitionPath
                ));
            }
        }
    }

    /**
     * Registers the specified block categories.
     *
     * @param array<BlockCategory> $categories A list of block category definitions.
     * @throws RuntimeException If problem registering.
     */
    protected function registerBlockCategories(array $categories): void
    {
        add_filter('block_categories_all', function (array $existingCategories) use ($categories) {
            foreach ($categories as $category) {
                $existingCategories[] = $category;
            }

            return $existingCategories;
        });
    }
}
