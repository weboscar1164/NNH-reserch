@extends('layouts.app')

@section('content')
<h1 class="h2 mb-3">過去の投稿</h1>
<ul class="container">
    @foreach($topics as $topic)
    <x-topic-list-item :topic="$topic" :is-home="false" />
    @endforeach
    <!-- <li class="topic row bg-white shadow-sm mb-3 rounded p-3">

        <div class="view col-auto min-w-100 text-center">
            <div class="h1 mb-0">26</div>
            <div class="mb-0">Views</div>
        </div>
    </li> -->
</ul>
@endsection