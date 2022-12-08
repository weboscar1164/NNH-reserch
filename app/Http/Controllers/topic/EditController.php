<?php

namespace App\Http\Controllers\topic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function get(int $id)
    {

        $topic = Topic::select('title', 'id', 'published', 'user_id')
            ->whereId($id)
            ->first();

        $topic_choices = DB::table('topics')
            ->select(
                'choice1',
                'choice2',
                'choice3',
                'choice4',
                'choice5',
            )
            ->whereId($id)
            ->first();

        return view('topic.edit', [
            'topic' => $topic,
            'topic_choices' => $topic_choices
        ]);
    }

    public function edit(int $id, Request $request)
    {
        $topic = Topic::select('title', 'id', 'published', 'user_id')
            ->whereId($id)
            ->first();
        $topic->published = $request->published;
        $topic->save();

        return redirect()->route('topic.archive', [
            $topic->user_id,
        ]);
    }

    public function delete(int $id)
    {
        Topic::whereId($id)
            ->delete();

        return redirect()->route('topic.archive');
    }
}