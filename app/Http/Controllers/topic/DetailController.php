<?php

namespace App\Http\Controllers\topic;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use stdClass;

class DetailController extends Controller
{
    public function get(int $id)
    {
        $topic_detail = Topic::select('topics.id', 'topics.views', 'users.name')
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->where('topics.id', '=', $id)
            ->where('deleted_at', '=', null)
            ->first();

        $topic_detail->views++;
        $topic_detail->save();

        $topic_choices = DB::table('topics')
            ->select(
                'choice1',
                'choice2',
                'choice3',
                'choice4',
                'choice5',
            )
            ->whereId($id)
            ->where('deleted_at', '=', null)
            ->orderby('id', 'desc')
            ->first();

        $topic_answers = DB::table('topics')
            ->select(
                'answer1',
                'answer2',
                'answer3',
                'answer4',
                'answer5',
            )
            ->whereId($id)
            ->where('deleted_at', '=', null)
            ->orderby('id', 'desc')
            ->first();

        $topic_results = controller::fetchResults($topic_choices, $topic_answers);

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->whereTopicId($id)
            ->where('deleted_at', '=', null)
            ->where('comment_body', '!=', null)
            ->orderby('comments.id', 'desc')
            ->get();

        return view(
            'topic.detail',
            [
                'topic_detail' => $topic_detail,
                'topic_results' => $topic_results,
                'comments' => $comments,
            ]
        );
    }
}