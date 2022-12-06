@extends('layouts.app')

@php
@endphp

@section('content')
<div class="py-5">
    <x-topic-header-item :topic-detail="$topic_detail" :topic-results="$topic_results" :data-choice="$data_choice" :data-answer="$data_answer"/>
    <ul class="list-unstyled">
        @foreach($topics as $topic)
        <x-topic-list-item :topic="$topic" :is-home="true" />
        @endforeach
    </ul>
</div>
@endsection