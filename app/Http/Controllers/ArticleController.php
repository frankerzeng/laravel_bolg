<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller {

    private $table = 'articles';

    public function __construct() {
        //        $this->middleware([]);
        //        $this->middleware([],['only'=>[]]);
        //        $this->middleware([],['except'=>[]]);
    }

    public function get_list(Request $request, Response $response) {
        //        echo $request->url();
        //        echo $request->getUriForPath('index');
        //        echo $request->fullUrl();
        //        print_r($request->all());
        //        $response->withCookie(cookie('narrme', 'val', 1000));
        //        \Cookie::queue('name_queue', 'dddd', 100);

        //        return response("ddssdfs")->cookie("<","d");

        $page = $request->get('page', 1);

        $keyword = $request->get('keyword');

        $size = $request->get('size', \Config::get('app.default_page_size'));

        $f_db = \DB::table($this->table)->when($keyword != null, function ($query) use ($keyword) {
            return $query->where('title', 'like', $keyword);
        });

        $list = $f_db->offset($size * ($page - 1))->limit($size)->get();

        $count = $f_db->count();

        return ['list' => $list, 'total_page' => $count];
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
