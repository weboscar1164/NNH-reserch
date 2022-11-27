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

        $topic_detail = DB::table('topics')
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
            ->first();

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
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('id', 'desc')
            ->first();

        foreach ($topic_choices as $choice) {
            $topic_results[]['choice'] = $choice;
        }

        $i = 0;
        foreach ($topic_answers as $answer) {
            $topic_results[$i]['answer'] = $answer;
            $i++;
        }

        $topics = DB::table('topics')
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->wherePublished(1)
            ->where('deleted_at', '=', null)
            ->orderby('topics.id', 'desc')
            ->get();

        return view(
            'home',
            [
                'topic_detail' => $topic_detail,
                'topic_results' => $topic_results,
                'topics' => $topics,
            ]
        );
    }
}