<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Topic;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get()
    {

        $topic_detail = Topic::select('topics.title', 'topics.id', 'topics.views', 'users.name')
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
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
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
            ->first();

        $topic_answers = DB::table('topics')
            ->select(
                'answer1',
                'answer2',
                'answer3',
                'answer4',
                'answer5',
            )
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
            ->first();

        $topic_results = Controller::fetchResults($topic_choices, $topic_answers);
        $data_choice = controller::makeDataArray($topic_results, 'choice');
        $data_answer = controller::makeDataArray($topic_results, 'answer');

        $topics = DB::table('topics')
            ->select('topics.id', 'topics.title', 'topics.published', 'topics.views', 'users.name',)
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
            ->get();

        $is_answerd = controller::get_is_answerd($topic_detail->id);

        $likes_results = Controller::get_likes($topic_detail->id);

        return view(
            'home',
            [
                'topic_detail' => $topic_detail,
                'topic_results' => $topic_results,
                'data_choice' => $data_choice,
                'data_answer' => $data_answer,
                'topics' => $topics,
                'is_answerd' => $is_answerd,
                'likes_results' => $likes_results
            ]
        );
    }
}