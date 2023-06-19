<?php

declare(strict_types=1);

namespace RedAcre\TestA1;

use OutOfBoundsException;
use RuntimeException;

/**
 * Resolves a path to a URL.
 */
interface UrlResolverInterface
{
    /**
     * Resolves a URL from a path.
     *
     * @param string $path The path to resolve a URL from.
     *
     * @return string The URL that corresponds to the specified path.
     *
     * @throws OutOfBoundsException If path is not accessible via a URL.
     * @throws RuntimeException If problem resolving.
     */
    public function resolveUrl(string $path): string;
}
