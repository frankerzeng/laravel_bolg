<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller {
    public function index() {
        $ff = \App::environment(); // local
        $ff = \App::environment('local'); // true

        $f = config('app.timezone'); // 获取配置
        return view('index.index');
    }
}