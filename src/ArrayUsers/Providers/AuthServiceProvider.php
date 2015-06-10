<?php namespace ArrayUsers\Providers;

use Illuminate\Support\Facades\Auth;
use ArrayUsers\Auth\ArrayUserProvider;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->extendAuth();

        $this->setupConfig();
    }

    /**
     * Extend the Auth with our user provider.
     *
     * @return void
     */
    protected function extendAuth()
    {
        Auth::extend('array', function($app) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            return new ArrayUserProvider();
        });
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../../config/array-user-provider.php');

        $this->publishes([$source => config_path('array-user-provider.php')]);

        $this->mergeConfigFrom($source, 'array-user-provider');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
