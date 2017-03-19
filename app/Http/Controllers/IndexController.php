<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller {

    // 中间件-认证
    public function __construct() {
        //        $this->middleware('auth');
    }

    public function after() {

    }

    public function index() {
        $ff = \App::environment(); // local
        $ff = \App::environment('local'); // true

        $f = config('app.timezone'); // 获取配置
        \View::addExtension('html', 'php');


//        echo $dd = json_encode(array("aa"=>'sdf'));
//        $ap = \App::make("Helper_String");
//        print_r($ap->str2arr($dd));
//        echo 11;
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