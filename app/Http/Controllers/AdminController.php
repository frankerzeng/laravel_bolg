<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller {
    public function login_page() {
        \View::addExtension('html','php');
        return view('login_page.html');
    }
}
