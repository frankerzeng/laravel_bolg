<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EditController extends Controller {

    //
    public function postdata(Request $request) {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:2',
        ]);

        if ($validator->fails()) {

            return redirect('/')->withInput()->withErrors($validator);
        }
        return 1;

    }
}
