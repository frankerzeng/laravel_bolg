<?php

namespace App\Providers;

use App\Shop;
use App\User;
use App\User_Bind;
use Illuminate\Support\ServiceProvider;

class TableHelpProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //一个新模型被首次保存的时候，creating和created事件会被触发。如果一个模型已经在数据库中存在并调用save方法，
        //updating/updated事件会被触发，无论是创建还是更新，saving/saved事件都会被调用。
        Shop::created(function ($user) {
            $f = fopen("." . DIRECTORY_SEPARATOR . "sql_log" . DIRECTORY_SEPARATOR . date("Y-m-d", time()) . "_shop_created.txt", "a+");
            fwrite($f, json_encode($user) . "\n");
            fclose($f);
        });
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
