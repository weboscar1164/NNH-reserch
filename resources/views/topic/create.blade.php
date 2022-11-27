@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="h2 mb-3">トピック作成</h1>
            <div class="bg-white p-4 shadow-sm rounded ">
                <form action="">
                    <div class="form-group mb-3">
                        <label for="">タイトル</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">ステータス</label>
                        <select name="" id="" class="form-control">
                            <option value="1" selected>公開</option>
                            <option value="0">非公開</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">回答1</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">回答2</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">回答3</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">回答4</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">回答5</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="pe-3">
                            <input type="submit" value="送信" class="btn btn-primary shadow-sm">
                        </div>
                        <div>
                            <a href="">戻る</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection