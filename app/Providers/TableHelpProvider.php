<?php

namespace App\Providers;

use App\User_Bind;
use Illuminate\Support\ServiceProvider;

class TableHelpProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('user_bind', function ($app) {
            return new User_Bind();
        });
    }
}
