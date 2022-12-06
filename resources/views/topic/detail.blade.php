@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container-lg">
        <x-topic-header-item :topic-detail="$topic_detail" :topic-results="$topic_results" :data-choice="$data_choice" :data-answer="$data_answer"/>
    </div>
    <ul class="list-unstyled">
        @foreach($comments as $comment)
        @php
        $answer = $comment->answer;
        @endphp
        <li class="bg-white shadow-sm mb-3 rounded p-3">
            <h2 class="h4 mb-2">
                <span class="badge bg-success mr-1 align-bottom">{{ $answer }}
                    :{{$topic_results->$answer['choice']}}</span>
                <span class="text-body" href="">{{ $comment->comment_body}}</span>
            </h2>
            <span>Commented by {{$comment->name}}</span>
        </li>
        @endforeach
    </ul>
</div>
@endsection