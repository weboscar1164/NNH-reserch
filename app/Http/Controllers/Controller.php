<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Comment;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function fetchResults($topic_choices, $topic_answers)
    {
        $i = 1;
        $topic_results = new \stdClass;
        foreach ($topic_choices as $choice) {
            $topic_results->$i['choice'] = $choice;
            $i++;
        }

        $i = 1;
        foreach ($topic_answers as $answer) {
            $topic_results->$i['answer'] = $answer;
            $i++;
        }

        return $topic_results;
    }

    public function makeDataArray($topic_results, $name)
    {
        $i = 0;
        foreach ($topic_results as $result) {
            if ($result['choice'] !== null) {
                $result_array['choice'][$i] = $result['choice'];
                $result_array['answer'][$i] = $result['answer'];
            }
            $i++;
        }
        return $result_array[$name];
    }

    public function get_is_answerd($selected_topic_id)
    {
        return Comment::select('id', 'answer')
            ->where('topic_id', $selected_topic_id)
            ->where('user_id', Auth::user()->id)
            ->first();
    }
}