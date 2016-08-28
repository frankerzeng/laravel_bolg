<?php
// 创建模型命令
//php artisan make:model User

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Bind extends Model {

    protected $table = 'user_bind';

    public $timestamps = false;

}
