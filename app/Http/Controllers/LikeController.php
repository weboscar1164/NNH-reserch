<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($id)
    {
        Auth::user()->like($id);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($id)
    {
        Auth::user()->unlike($id);
        return 'ok!'; //レスポンス内容
    }
}