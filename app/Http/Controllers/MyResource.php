<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use App\User_Bind;

class MyResource extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //
        $user_list = User_Bind::all();

        // 条件查询
        $user_list = User_Bind::where("user_bind_id", "56a5cfb406bb1c0d")->orderBy("channel", "desc")->take(2)->get();
        $user_list1 = User_Bind::where("user_bind_id", "56a5cfb406bb1c0d")->count();

        // 插入数据
        $user_op = new User_Bind();
        $user_op->token = "q233232";
        $user_op->user_bind_id = time();
        $user_op->save();

        // 更新数据
        $rest = User_Bind::where("token", "q233232")->update(["token" => "sdlfjsdlfjl"]);

        $title = "首页";
        header("Access-Control-Allow-Origin:*");
        return [$user_list, $user_list1, $rest, $title];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return __FUNCTION__;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
