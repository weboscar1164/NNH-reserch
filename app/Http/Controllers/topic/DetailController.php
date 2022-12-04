<?php

namespace App\Http\Controllers\topic;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use stdClass;

class DetailController extends Controller
{
    public function get(int $id)
    {
        $topic_detail = Topic::select('topics.title', 'topics.id', 'topics.views', 'users.name')
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

    public function answer(AnswerRequest $request)
    {
        $answer_number = 'answer' . $request->answer;
        $topic_answer = DB::table('topics')
            ->select(
                $answer_number
            )
            ->whereId($request->topic_id)
            ->first();

        $result = $topic_answer->$answer_number + 1;

        Topic::where('id', $request->topic_id)->update([
            $answer_number => $result
        ]);

        $comment = new Comment();
        $comment->topic_id = $request->topic_id;
        $comment->user_id = $request->user_id;
        $comment->answer = $request->answer;
        $comment->comment_body = $request->comment_body;

        $comment->save();

        return redirect()->route('topic.detail', [
            'id' => $request->topic_id,
        ]);
    }
}