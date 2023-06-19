<?php

declare(strict_types=1);

namespace RedAcre\TestA1\Test;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use WP_Theme;
use function Brain\Monkey\Functions\when;

/**
 * Base class for project tests.
 */
class AbstractTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Monkey\setUp();

        $stubsDir = STUBS_DIR;
        require_once "$stubsDir/WP_Theme.php";

        // __()
        when('__')
            ->returnArg();

        // wp_get_theme()
        $theme = $this->getMockBuilder(WP_Theme::class)
            ->disableOriginalConstructor()
            ->onlyMethods([
                'get',
            ])
            ->getMock();
        $theme->method('get')
            ->with($this->isType('string'))
            ->will($this->returnValueMap([
                ['Title', 'My Theme'],
                ['Version', '1.2.3'],
            ]));
        when('wp_get_theme')
            ->justReturn($theme);

        // get_theme_root_uri
        when('get_theme_root_uri')
            ->justReturn('http://example.com/wp-content/themes');
    }

    public function tearDown(): void
    {
        Monkey\tearDown();
        parent::tearDown();
    }
}
