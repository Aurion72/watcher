<?php

namespace Aurion72\Watcher\Tests;

use Aurion72\Watcher\Facades\Watcher;
use Aurion72\Watcher\WatcherServiceProvider;
use Orchestra\Testbench\TestCase;

class WatcherTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [WatcherServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'watcher' => Watcher::class,
        ];
    }

    public function testExample()
    {
        assertEquals(1, 1);
    }
}
