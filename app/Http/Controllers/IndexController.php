<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller {
    public function before() {

        sleep(111);
        echo 11;
    }

    public function after() {

    }

    public function index() {
        $ff = \App::environment(); // local
        $ff = \App::environment('local'); // true

        $f = config('app.timezone'); // 获取配置
        \View::addExtension('html', 'php');


        return view('index.index');
    }

    public function get_menu() {
        $menu = [
            [
                "title" => "首页",
                "link" => "index",
                "css" => "font-weight:bold;font-size: larger;margin-left:40px",
            ],
            [
                "title" => "文章",
                "link" => "articles",
                "css" => ""
            ],
            [
                "title" => "Git",
                "link" => "http://github.com/frankerzeng",
                "css" => ""
            ],
        ];
        return $menu;
    }
}