<?php

namespace App\Http\Middleware;

use Closure;

class AfterMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // 先执行next，就是后置中间件
        $response = $next($request);

        // 保存sql
        $file_name = "." . DIRECTORY_SEPARATOR . "sql_log" . DIRECTORY_SEPARATOR . date('Y-m-d', time()) . ".txt";
        $file = fopen($file_name, 'a+');
        fwrite($file, date('H-i-s') . '------' . json_encode(\DB::getQueryLog(), JSON_UNESCAPED_UNICODE) . "\n");
        fwrite($file, '------------------------------------------------------------------------' . "\n");
        fclose($file);

        return $response;
    }
}
