<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TitleIndex extends Controller {
    public function __construct() {

    }

    // GET	/article	index	索引/列表
    public function index() {

    }

    //GET	/article/{id}	show	显示对应id的内容
    public function show($id) {
        return $id;
    }

    //POST	/article	store	保存你创建的数据
    public function store($id) {
        return $id;
    }

    //PUT/PATCH	/article/{id}	save	保存你编辑的数据
    public function save($id) {
        return $id;
    }

    //DELECT	/article/{id}	destroy	删除
    public function destroy($id) {
        return $id;
    }
}
