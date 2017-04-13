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
        $validator = Validator::make($data, User::$rules);

        if (!$validator->fails()) {
            return $this->login_type($data, "email");
        } else {
            $data["name"] = $data['email'];
            unset($data['email']);
            $validator = Validator::make($data, User::$rules);
            if (!$validator->fails()) {
                return $this->login_type($data, "name");
            } else {
                return ["code" => 2, "msg" => json_encode($validator->errors())];
            }
        }
    }

    private function login_type($data, $type) {
        $list = \DB::table(self::$table)->limit(1)->get();
        if (empty($list)) {
            self::init();
        }

        \Auth::logout();

        if (\Auth::attempt([$type => $data[$type], 'password' => $data['password']])) {
            return ["code" => 0, "msg" => "success"];
        } else {
            return ["code" => 1, "msg" => "用户名或密码错误"];
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

        file_put_contents("ggit-webhook1.txt", json_encode($user_data), FILE_APPEND);
        print_r('-------');
        print_r($user_data);
    }
}
