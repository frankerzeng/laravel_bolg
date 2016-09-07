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


}
