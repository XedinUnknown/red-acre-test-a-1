<?php

declare(strict_types=1);

namespace RedAcre\TestA1;

use OutOfBoundsException;
use RuntimeException;

/**
 * A URL resolver that replaces an absolute base path with a base URL.
 */
class AbsolutePathUrlResolver implements UrlResolverInterface
{
    /** @var string */
    protected $basePath;
    /** @var string */
    protected $baseUrl;

    /**
     * @param string $basePath The absolute path, in which all other paths must reside.
     *                         No trailing slash.
     * @param string $baseUrl The URL that corresponds to the base
     */
    public function __construct(string $basePath, string $baseUrl)
    {
        $this->basePath = $basePath;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @inheritDoc
     */
    public function resolveUrl(string $path): string
    {
        $basePath = $this->basePath;

        if (substr($path, 0, 1) !== '/') {
            $path = strlen($path)
                ? "$basePath/$path"
                : $basePath;
        }

        $pathStart = substr($path, 0, strlen($basePath));
        if ($pathStart !== $basePath) {
            throw new OutOfBoundsException(sprintf('Path "%1$s" is not within root path "%2$s"', $path, $basePath));
        }

        $baseUrl = $this->baseUrl;
        $basePathLength = strlen($basePath);

        $relativePath = substr($path, $basePathLength);
        if ($relativePath === false) {
            throw new RuntimeException(sprintf('Could not take slice of "%1$s" starting at', $path, $basePathLength));
        }

        $url = $baseUrl . $relativePath;

        return $url;
    }
}
