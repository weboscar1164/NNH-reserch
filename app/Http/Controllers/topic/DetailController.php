<?php

namespace App\Http\Controllers\topic;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Topic;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use stdClass;

class DetailController extends Controller
{
    public function get(Topic $topic)
    {
        $topic_test = Topic::where('id', $topic->id)->with(['owner', 'likes'])->first();
        $current_topic = Topic::find($topic->id)->owner;
        $current_topic2 = Topic::find($topic->id)->with('owner');

        $topic_test->email;




        $topic_detail = Topic::select('topics.title', 'topics.id', 'topics.views', 'users.name')
            ->join('users', 'topics.user_id', '=', 'users.id')
            ->where('topics.id', '=', $topic->id)
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
            ->whereId($topic->id)
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
            ->whereId($topic->id)
            ->where('deleted_at', '=', null)
            ->orderby('id', 'desc')
            ->first();

        $topic_results = controller::fetchResults($topic_choices, $topic_answers);
        $data_choice = controller::makeDataArray($topic_results, 'choice');
        $data_answer = controller::makeDataArray($topic_results, 'answer');

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->whereTopicId($topic->id)
            ->where('deleted_at', '=', null)
            ->where('comment_body', '!=', null)
            ->orderby('comments.id', 'desc')
            ->get();

        $is_answerd = Controller::get_is_answerd($topic_detail->id);
        $likes_results = Controller::get_likes($topic->id);

        return view(
            'topic.detail',
            [
                'topic_detail' => $topic_detail,
                'topic_results' => $topic_results,
                'data_choice' => $data_choice,
                'data_answer' => $data_answer,
                'comments' => $comments,
                'is_answerd' => $is_answerd,
                'likes_results' => $likes_results
            ]
        );
    }

    public function answer(AnswerRequest $request, Topic $topic)
    {
        $answer_number = 'answer' . $request->answer;
        $topic_answer = DB::table('topics')
            ->select(
                $answer_number
            )
            ->whereId($request->topic_id)
            ->first();

        $result = $topic_answer->$answer_number + 1;

        Topic::where('id', $topic->id)->update([
            $answer_number => $result
        ]);

        $comment = new Comment();
        $comment->topic_id = $request->topic_id;
        $comment->user_id = $request->user_id;
        $comment->answer = $request->answer;
        $comment->comment_body = $request->comment_body;

        $comment->save();

        return redirect()->route('topic.detail', [
            'topic' => $request->topic_id,
        ]);
    }

    public function delete_comment(int $comment_id)
    {
        $target_comment = Comment::whereId($comment_id)->first();
        $topic_id = $target_comment->topic_id;
        $target_comment->delete();

        return redirect()->route('topic.detail', ['topic' => $topic_id]);
    }
}