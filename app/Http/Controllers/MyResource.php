<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Gate;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use App\User_Bind;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MyResource extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //
        $user_list = User_Bind::all();

        /**eloquent ORM*/
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
        /**eloquent ORM end*/

        $title = "首页";

        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        $allow_origin = ['http://localhost:63343/zeng/dist*'];
//        if (in_array($origin, $allow_origin)) {
        header("Access-Control-Allow-Origin:" . $origin);
//        }


        // facade 门面
        $cache = Cache::get("user");

        /**原生sql*/
        $user_info[] = DB::select("select * from USER");
        $user_info[] = DB::select("select * from USER_bind WHERE user_bind_id = ?", ["1472375648"]);
        $user_info[] = DB::select("select * from USER_bind WHERE user_bind_id = :user_bind_id", ["user_bind_id" => "1472375648"]);

        $user_bind_id = time() . rand(1000, 9999);
        // 返回bool
        $user_info[] = DB::insert("insert into user_bind(user_bind_id) values(?)", [$user_bind_id]);

        // 返回影响行数
        $user_info[] = DB::update("update user_bind set token=? WHERE user_bind_id = ?", ["12222222222", $user_bind_id]);

        // 返回影响行数
        $user_info[] = DB::delete("delete from user_bind WHERE user_bind_id = ?", [$user_bind_id]);

        // 通用语句,返回是否成功
        $user_info[] = DB::statement("select * from user");

        /**原生sql end*/

        /**事务*/
        DB::transaction(function () {
            $user_bind_id = time() . rand(1000, 9999) . "o";
            DB::insert("insert into user_bind(user_bind_id) values(?)", [$user_bind_id]);
        });

        DB::beginTransaction();
        $user_bind_id = time() . rand(1000, 9999) . "p";
        DB::insert("insert into user_bind(user_bind_id) values(?)", [$user_bind_id]);
        DB::commit();

        DB::beginTransaction();
        $user_bind_id = time() . rand(1000, 9999) . "q";
        $rst = DB::insert("insert into user_bind(user_bind_id) values(?)", [$user_bind_id]);

        DB::rollBack();


        /**事务 end*/


        /**原生sql end*/
        /**原生sql end*/
        /**原生sql end*/

        // 依赖注入
        $user_bind = App::make("user_bind");
        $timestamps = $user_bind->timestamps;

        new \stdClass();
        /**查询构建*/
        $user_all = $user_bind->getAll();
//        $user_all = new User_Bind();
//        $user_all = $user_all->getAll();
        $user_one = $user_bind->getOne(["channel", "ty"]);
        $user_count = $user_bind->getCount();
//        $getLists = $user_bind->getLists(["channel"]);
        $getAs = $user_bind->getAs(["channel", "ty"]);
        $getWhere = $user_bind->getWhere();
        $condition = ["channel", "ty"];
        $getOrder = $user_bind->getOrder($condition);
        // 插入一条
        $add = $user_bind->add(["user_bind_id" => microtime(), "channel" => "tyy"]);
        // 插入多条
        $add1 = $user_bind->add([["user_bind_id" => microtime(), "channel" => "tyy"]]);


        $del = $user_bind->del('tyy');


        /**eloquent ORM*/
        $shop_all = Shop::all();

        // 设置批量赋值属性
        $shop_op = Shop::create(["shop_id" => microtime(), "name" => date("ymd hms")]);

        /**eloquent ORM     end*/

        $shop = Shop::findOrFail("568e2bad26264c0d");
        if (Gate::denies('has-address', $shop)) {
//            abort(403,"d");
        }


        $ret = [$user_list, $user_list1, $rest, $title, $cache, count($user_info), $rst, $timestamps, count($user_all), $user_one,
            $user_count/*, $getLists*/, $getAs, $getWhere, $getOrder, $add, $add1, $del
        ];
        $ret1 = [count($shop_all), $this->getRouter()];

        return $ret1;
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
