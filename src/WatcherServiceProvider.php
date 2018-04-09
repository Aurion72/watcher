<?php

namespace Aurion72\Watcher;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WatcherServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../config/aurion72_watcher.php';

    //protected $defer = true;

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('aurion72_watcher.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'aurion72_watcher');


        $this->app->bind('watcher', function ($app) {
            try {
                return new Watcher($app->make('request'), (new Client()));
            } catch (\Exception $e) {

            }
        });
    }
}
