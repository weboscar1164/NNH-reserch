<?php

namespace App\Http\Controllers\topic;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function get()
    {
        $topics = Topic::select('topics.id', 'topics.views', 'topics.title', 'topics.published', 'users.name')
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->whereUserId(Auth::id())
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
            ->get();


        return view(
            'topic.archive',
            [
                'topics' => $topics,
            ]
        );
    }
}