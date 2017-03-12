<?php
//php artisan make:middleware BeforeMiddleware
//php artisan make:middleware AfterMiddleware

namespace App\Http\Middleware;

use Closure;

class BeforeMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // 开启sql日志
        \DB::enableQueryLog();
        return $next($request);
    }
}
