<?php

namespace App\Providers;

use App\Helper\String as Help_Srting;
use Illuminate\Support\ServiceProvider;

class SendMailServiceProvider extends ServiceProvider {
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
        // 写法1
        //        后面的调用都会从容器中返回相同的实例
        $this->app->singleton('Helper_String', function () {
            return new Help_Srting();
        });

        // 写法2
        //        $this->app->bind()
    }
}
