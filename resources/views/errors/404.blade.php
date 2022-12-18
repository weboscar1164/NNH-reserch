@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-auto my-3">
        <div class="text-center">
          <p class="h4 mb-4">お探しのページは見つかりませんでした。</p>
          <a href="{{ route('home') }}" class="btn btn-primary">
            ホームへ戻る
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection