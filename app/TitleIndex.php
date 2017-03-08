<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitleIndex extends Model {
    public $table = "TitleIndex";

    protected $primaryKey = "TitleIndex_id";

    // 不打上时间戳
    public $timestamps = false;

    // 设置批量赋值属性
    protected $fillable = ['TitleIndex_id', 'name', "sort", "status", "create_time"];
}
