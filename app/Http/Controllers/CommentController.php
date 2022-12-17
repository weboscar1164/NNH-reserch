<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Comment;
use App\Http\Requests\AnswerRequest;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(AnswerRequest $request, Topic $topic)
    {
        $answer_number = 'answer' . $request->answer;

        $comment = new Comment();
        $comment->topic_id = $request->topic_id;
        $comment->user_id = $request->user_id;
        $comment->answer = $request->answer;
        $comment->comment_body = $request->comment_body;

        $comment->save();

        $result = Comment::where('topic_id', $topic->id)->whereAnswer($request->answer)->count();

        Topic::where('id', $topic->id)->update([
            $answer_number => $result
        ]);

        return redirect()->route('topic.detail', [
            'topic' => $request->topic_id,
        ]);
    }

    public function delete(Comment $comment)
    {
        $answer_number = 'answer' . $comment->answer;

        $target_comment = Comment::whereId($comment->id)->first();
        $topic_id = $target_comment->topic_id;
        $target_comment->delete();

        $result = Comment::where('topic_id', $target_comment->topic_id)->whereAnswer($target_comment->answer)->count();

        Topic::where('id', $target_comment->topic_id)->update([
            $answer_number => $result
        ]);

        return redirect()->route('topic.detail', ['topic' => $topic_id]);
    }
}