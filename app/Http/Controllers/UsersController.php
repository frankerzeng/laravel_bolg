<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller {

    public static $table = "users";

    public function login(Request $request) {
        $data = $request->all();
        $data["name"] = $data['email'];
        $validator = Validator::make($data, User::$rules);

        if (!$validator->fails()) {
            $list = \DB::table(self::$table)->get();
            if (empty($list)) {
                self::init();
            }

            \Auth::logout();

            if (\Auth::attempt(["email" => $data['email'], 'password' => $data['password']])) {
                // 用户名登录，或者手机号
                // if (\Auth::attempt(["name" => 'frank1', 'password' => '111111']))

                return ["code" => 0, "msg" => "success"];
            } else {
                return ["code" => 1, "msg" => "fail"];
            }
        } else {
            return ["code" => 2, "msg" => json_encode($validator->errors())];
        }
    }

    public function after_login(Request $request) {
        if (\Auth::attempt(["name" => 'frank', 'password' => '111111']))

            var_dump($request->user());
        var_dump('----');
        var_dump(\Auth::user());
        return;
        if (\Auth::check()) {
            echo "11 success";
        } else {
            echo "222 false";
        }
    }

    private static function init() {
        $about_me = config('app.about_me');
        \DB::table(self::$table)->insert(["name" => $about_me['name'], "email" => $about_me['email'], "password" => \Hash::make($about_me['password']),//todo 改密码
        ]);
    }

    public function login_weixin() {
        return Socialite::with("weixin")->redirect();
    }

    public function login_weixin_callback() {
        $user_data = Socialite::with("weixin")->user();

        print_r('-------');
        print_r($user_data);
    }
}
