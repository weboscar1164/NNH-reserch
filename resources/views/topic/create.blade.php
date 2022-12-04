@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="h2 mb-3">トピック作成</h1>
            <div class="bg-white p-4 shadow-sm rounded ">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('topic.create') }}" method="POST">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">タイトル</label>
                        <input name="title" id="title" type="text" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="published">ステータス</label>
                        <select name="published" id="published" class="form-control">
                            <option value="1" selected>公開</option>
                            <option value="0">非公開</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="choice1">回答1</label>
                        <input id="choice1" name="choice1" type="text" class="form-control"
                            value="{{ old('choice1') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="choice2">回答2</label>
                        <input id="choice2" name="choice2" type="text" class="form-control"
                            value="{{ old('choice2') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="choice3">回答3</label>
                        <input id="choice3" name="choice3" type="text" class="form-control"
                            value="{{ old('choice3') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="choice4">回答4</label>
                        <input id="choice4" name="choice4" type="text" class="form-control"
                            value="{{ old('choice4') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="choice5">回答5</label>
                        <input id="choice5" name="choice5" type="text" class="form-control"
                            value="{{ old('choice5') }}">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="pe-3">
                            <input type="submit" value="送信" class="btn btn-primary shadow-sm">
                        </div>
                        <div>
                            <a href="javascript:history.back()">戻る</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection