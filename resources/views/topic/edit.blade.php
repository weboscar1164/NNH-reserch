@extends('layouts.app')
@php
$published_selected = $topic->published == 1 ? 'selected' : '';
$unpublished_selected = $topic->published == 1 ? '' : 'selected';
@endphp
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">

            <h1 class="h2 mb-3">トピック編集</h1>

            <div class="bg-white p-4 shadow-sm mx-auto rounded">
                <form action="{{ route('topic.edit', ['id'=>$topic->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div>タイトル</div>
                        <span class="h5">{{$topic->title}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <span>ステータス</span>
                        <select name="published" class="form-control">
                            <option value="1" {{$published_selected}}>公開</option>
                            <option value="0" {{$unpublished_selected}}>非公開</option>
                        </select>
                    </div>
                    <ul class="list-unstyled">
                        @php
                        $answer_number = 1
                        @endphp
                        @foreach($topic_choices as $topic_choice)
                        <li class="mb-3">
                            <div>回答{{ $answer_number }}</div>
                            <span class="h5">{{ $topic_choice }}</span>
                        </li>
                        @php
                        $answer_number++
                        @endphp
                        @endforeach
                    </ul>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="pe-3">
                                <input type="submit" value="送信" class="btn btn-primary shadow-sm">
                            </div>
                            <div>
                                <a href="javascript:history.back()">戻る</a>
                            </div>
                        </div>
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger shadow-sm">削除</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>
                    <div class="modal-title" id="myModalLabel">確認</div>
                </h4>
            </div>
            <div class="modal-body">
                <label>この操作はもとに戻せません。<br />トピックを削除しますか？</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">閉じる</button>
                <a href="{{ route('topic.delete', ['id' => $topic->id])}}" class="btn btn-danger shadow-sm mr-3">削除</a>
            </div>
        </div>
    </div>
</div>


@endsection