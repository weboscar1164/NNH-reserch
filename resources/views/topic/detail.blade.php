@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container-lg">
        <x-topic-header-item />
    </div>
    <ul class="list-unstyled">
        <li class="bg-white shadow-sm mb-3 rounded p-3">
            <h2 class="h4 mb-2">
                <span class="badge bg-success mr-1 align-bottom">1 たこ焼き</span>
                <a class="text-body" href="">はい、そうですね。</a>
            </h2>
            <span>Commented by テストユーザー</span>
        </li>
    </ul>
</div>
@endsection