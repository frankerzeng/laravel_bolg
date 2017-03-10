<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function sql() {

        return [
            $this->sql_test(),
        ];
    }

    private function sql_test() {
        $articles = \DB::select('select * from articles WHERE 1=?', [1]);
        $articles = \DB::insert('insert into articles(title) VALUES (?)', [1]);
        $articles = \DB::update('update articles set content=? WHERE title=?', [112, 1]);
//                $articles = \DB::delete('delete from articles WHERE 1=?', [1]);
        //        \DB::statement('show databases');

        \DB::beginTransaction();
        \DB::commit();
        \DB::rollBack();

        //        \DB::connection()->getPdo()->query("select * from articles")->fetchAll();

        // $articles ORM对象

        $t = "articles";

        $articles = \DB::table('articles')->get();
        $articles = \DB::table($t)->where('title', 1)->offset(2)->limit(3)->get();
        $articles = \DB::table($t)->where('title', 1)->pluck('title');
        $articles = \DB::table($t)->where('title', 'IN', ["1", 2, 3])->get();//todo

        $articles = \DB::table($t)->select('title as title_test')->distinct()->orderBy("title", "DESC")->get();

        $articles = \DB::table($t)->when(true, function ($query) {
            return $query->where("title", '1');
        })->get();

        // insert
        \DB::table($t)->insert([
            'title' => '2'
        ]);

        // update
        \DB::table($t)->where('title', '2')->update(['title' => '33', 'created_at' => '2010-11-11 11:12:21']);

        // delete
        \DB::table($t)->where('title', '1')->delete();

        return $articles;

    }
}
