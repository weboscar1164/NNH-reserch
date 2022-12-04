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
        // $request->validate([
        //     'title' => 'required|max:30',
        //     'published' => 'required',
        //     'choice1' => 'required|max:30',
        //     'choice2' => 'required|max:30',
        //     'choice3' => 'max:30',
        //     'choice4' => 'max:30',
        //     'choice5' => 'max:30',
        //     'user_id' => 'required'
        // ]);

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

        return redirect()->route('topic.detail', [
            'id' => $topic->id,
        ]);
    }
}