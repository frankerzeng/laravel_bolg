<?php
//>php artisan make:provider SqlProvider
//打印sql执行语句

namespace App\Providers;

use App\User_Bind;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class SqlProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    //打印sql执行语句
    public function boot() {
        DB::listen(function ($query) {
//            $f = fopen("." . DIRECTORY_SEPARATOR . "sql_log" . DIRECTORY_SEPARATOR . date("Y-m-d", time()) . ".txt", "a+");
//            fwrite($f, $query->sql . "\n");
//            fclose($f);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
//        $this->app->bind('user_bind', function ($app) {
//            return new User_Bind();
//        });
        // 单例
//        $this->app::singleton('zeng', function () {
//            return new User_Bind();
//        });
    }
}
