<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store(Topic $topic)
    {
        Auth::user()->like($topic->id);
        return 'ok!'; //レスポンス内容
    }

    public function destroy(Topic $topic)
    {
        Auth::user()->unlike($topic->id);
        return 'ok!'; //レスポンス内容
    }
}