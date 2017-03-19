<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
                return ["code" => 0, "msg" => "success"];
            } else {
                return ["code" => 1, "msg" => "fail"];
            }
        } else {
            return ["code" => 2, "msg" => json_encode($validator->errors())];
        }
    }

    public function after_login() {
        if (\Auth::check()) {
            echo "11 success";
        } else {
            echo "222 false";
        }
    }

    public static function init() {
        $about_me = config('app.about_me');
        \DB::table(self::$table)->insert([
            "name" => $about_me['name'],
            "email" => $about_me['email'],
            "password" => \Hash::make($about_me['password']),//todo 改密码
        ]);
    }

}
