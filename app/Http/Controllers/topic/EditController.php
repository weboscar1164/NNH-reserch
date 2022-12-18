<?php

namespace App\Http\Controllers\topic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function get(Topic $topic)
    {

        $current_topic = Topic::select('title', 'id', 'published', 'user_id')
            ->whereId($topic->id)
            ->first();

        $topic_choices = DB::table('topics')
            ->select(
                'choice1',
                'choice2',
                'choice3',
                'choice4',
                'choice5',
            )
            ->whereId($topic->id)
            ->first();

        return view('topic.edit', [
            'current_topic' => $current_topic,
            'topic_choices' => $topic_choices
        ]);
    }

    public function edit(Topic $topic, Request $request)
    {
        $current_topic = Topic::select('title', 'id', 'published', 'user_id')
            ->whereId($topic->id)
            ->first();
        $current_topic->published = $request->published;
        $current_topic->save();

        session()->flash('msg_success', 'トピックを編集しました。');

        return redirect()->route('topic.archive', [
            $current_topic->user_id,
        ]);
    }

    public function delete(Topic $topic)
    {
        Topic::whereId($topic->id)
            ->delete();

        session()->flash('msg_success', 'トピックを削除しました。');

        return redirect()->route('topic.archive', [
            $topic->user_id,
        ]);
    }
}