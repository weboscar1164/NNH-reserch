@extends('layouts.app')
@section('content')
@auth
<h1 class="h2 mb-3">過去の投稿</h1>
<ul class="container">
    @foreach($topics as $topic)
    <x-topic-list-item :topic="$topic" :is-home="false" />
    @endforeach
</ul>
@endauth
@guest
<div class="container text-center my-4">
    <h2>ログインが必要です。</h2>
    <a href="{{ route('login') }}" class="btn btn-primary my-4">ログイン画面へ</a>
</div>

@endguest
@endsection