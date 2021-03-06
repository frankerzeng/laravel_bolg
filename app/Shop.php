<?php
//php artisan make:model User

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model {
    public $table = "shop";

    protected $primaryKey = "shop_id";

    // 不打上时间戳
    public $timestamps = false;

    // 设置批量赋值属性
    protected $fillable = ['shop_id', 'name'];


}
