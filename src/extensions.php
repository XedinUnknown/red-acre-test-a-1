<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;

return function (): array {
    return [
        'redacre/blocks/definitions' => function (ContainerInterface $c, iterable $prev): iterable {
            $otherDefinitions = [
                $c->get('redacre/test-a1/theme/blocks/definitions'),
            ];

            yield from $prev;
            foreach ($otherDefinitions as $blockDefinition) {
                yield from $blockDefinition;
            }
        }
    ];
};
