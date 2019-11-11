<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribersController extends Controller
{
    public function store(Request $request) {
        if ($request->ajax()) {
            $validation = Validator::make($request->all(), array(
                'email' => 'required|email|max:255'
            ));

            if ($validation->fails()) {
                return $validation->errors()->first();
            } else {
                $create = Subscribe::create($request->all());
                return $create;
            }
        } else {
            return Redirect::to('subscribers');
        }
    }
}
