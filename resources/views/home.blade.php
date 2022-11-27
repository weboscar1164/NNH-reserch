@extends('layouts.app')

@php
@endphp

@section('content')
<div class="py-5">
    <x-topic-header-item :topic-detail="$topic_detail" :topic-results="$topic_results" />
    <ul class="list-unstyled">
        @foreach($topics as $topic)
        <x-topic-list-item :topic="$topic" />
        @endforeach
    </ul>
</div>
@endsection