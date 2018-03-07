<?php

namespace Aurion72\Watcher\Facades;

use Illuminate\Support\Facades\Facade;

class Watcher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'watcher';
    }
}
