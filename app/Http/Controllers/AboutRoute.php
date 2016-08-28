<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutRoute extends Controller {
    public function getAbout($id) {
        return "about";
    }

    public function aboutme() {
        $data = [
            'name' => 'zfl'
        ];
        return view('aboutme.aboutme', $data)->with(["age"=>22]);
    }

}
