<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller {
    public function get_list(Request $request) {

        $page = $request->get('page');

        $return = [
            [
                'id' => 1,
                'title_img' => 0,
                'title' => '关于大可拉进来踢了',
                'content' => '撒旦法撒旦法胜多负少都是对方水电费是双方都说的发射的多的地方是否说的
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                了'
            ],
            [
                'id' => 2,
                'title_img' => 1,
                'title' => '关于大可拉进来踢了',
                'content' => '撒旦法撒旦法胜多负少都是对方水电费是双方都说的发射的多的地方是否说的
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                了'
            ],
            [
                'id' => 3,
                'title_img' => 0,
                'title' => '关于大可拉进来踢了',
                'content' => '撒旦法撒旦法胜多负少都是对方水电费是双方都说的发射的多的地方是否说的
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                了'
            ],
            [
                'id' => 1,
                'title_img' => 0,
                'title' => '关于大可拉进来踢了',
                'content' => '撒旦法撒旦法胜多负少都是对方水电费是双方都说的发射的多的地方是否说的
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                了'
            ],
            [
                'id' => 1,
                'title_img' => 0,
                'title' => '关于大可拉进来踢了',
                'content' => '撒旦法撒旦法胜多负少都是对方水电费是双方都说的发射的多的地方是否说的
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                sd的于大可拉进来踢了于大可拉进来踢
                了'
            ],
        ];

        return ['list' => $return, 'total_page' => 3];
    }

    public function get($id) {

        $data = [
            'id' => $id,
            'title' => '3333',
            'content' => 'sldklfsdf',
            'date' => date('Y-m-d H:m:s', time()),
        ];
        return view('article.article', ['data' => $data]);
    }
}
