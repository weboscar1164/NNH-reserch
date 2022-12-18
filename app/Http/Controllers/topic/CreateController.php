<?php

namespace App\Http\Controllers\topic;

use App\Http\Requests\CreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function get()
    {
        return view('topic.create');
    }

    public function create(CreateRequest $request)
    {
        $topic = new Topic();

        $topic->title = $request->title;
        $topic->published = $request->published;
        $topic->choice1 = $request->choice1;
        $topic->choice2 = $request->choice2;
        $topic->choice3 = $request->choice3;
        $topic->choice4 = $request->choice4;
        $topic->choice5 = $request->choice5;
        $topic->user_id = $request->user_id;

        $topic->save();

        session()->flash('msg_success', 'トピックを作成しました。');

        return redirect()->route('topic.detail', [
            'topic' => $topic->id,
        ]);
    }
}