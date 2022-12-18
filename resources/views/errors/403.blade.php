@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-auto yx-3">
        <div class="text-center">
          <p class="h4 mb-3">お探しのページにアクセスする権限がありません。</p>
          <a href="{{ route('home') }}" class="btn btn-primary">
            ホームへ戻る
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection