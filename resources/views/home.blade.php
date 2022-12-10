@extends('layouts.app')

@php
@endphp

@section('content')
<div class="py-5">
    <x-topic-header-item :topic-detail="$topic_detail" :topic-results="$topic_results" :data-choice="$data_choice" :data-answer="$data_answer" :is-answerd="$is_answerd"/>
    <ul class="list-unstyled">
        @php
        $i = 0
        @endphp
        @foreach($topics as $topic)
        @if($i !== 0)
        <x-topic-list-item :topic="$topic" :is-home="true" />
        @endif
        @php
        $i++
        @endphp
        @endforeach
    </ul>
</div>
@endsection