<?php

namespace App\Http\Controllers\topic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function get()
    {
        return view('topic.create');
    }
}