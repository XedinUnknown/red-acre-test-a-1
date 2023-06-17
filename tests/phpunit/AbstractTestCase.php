<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Test;

use PHPUnit\Framework\TestCase;

/**
 * Base class for project tests.
 */
class AbstractTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
