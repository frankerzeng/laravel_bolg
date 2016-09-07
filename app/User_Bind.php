<?php
// 创建模型命令
//php artisan make:model User
// php artisan migrate 生成表


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Bind extends Model {

    protected $table = 'user_bind';

    public $timestamps = false;

    /** 查询构建器*/
    public function getAll() {
        $user_list = DB::table($this->table)->get();
        return $user_list;
    }


    public function getOne($condition) {
        $user_list = DB::table($this->table)->where($condition[0], $condition[1])->first();
        return $user_list;
    }

    public function getCount() {
        $user_list = DB::table($this->table)->where("token", "!=", "")->count();
        return $user_list;
    }

    // 返回字段
    public function getLists($lists) {
        $user_list = DB::table($this->table)->lists($lists[0]);
        return $user_list;
    }

    public function getAs($condition) {
        $user_list = DB::table($this->table)->select("token as tk")->where($condition[0], $condition[1])->get();
        return $user_list;
    }

    public function getWhere() {
        $user_list = DB::table($this->table)->whereIn('channel', ["ty"])->get();
        $user_list1 = DB::table($this->table)->whereNotIn('channel', ["ty"])->get();
        $user_list2 = DB::table($this->table)->whereBetween('channel', ["ty", ""])->get();

        return [count($user_list), count($user_list1), count($user_list2), DB::table($this->table)->where("channel", "IN", "ar")->where("id", "1")];
    }

    public function getOrder($condition) {
        $user_list = DB::table($this->table)->where($condition[0], $condition[1])->orderBy("user_bind_id", "ASC")->get();
        return $user_list;
    }

    public function add($data) {
        $user_info = Db::table($this->table)->insert($data);
        return $user_info;
    }

    public function del($condition) {
        $user_info = Db::table($this->table)->where('channel', $condition)->delete();
        return $user_info;
    }

}
