@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">

            <h1 class="h2 mb-3">トピック編集</h1>

            <div class="bg-white p-4 shadow-sm mx-auto rounded">
                <form action="">
                    <div class="mb-3">
                        <div>タイトル</div>
                        <span class="h5">好きな粉ものは？</span>
                    </div>
                    <div class="form-group mb-3">
                        <span>ステータス</span>
                        <select name="" id="" class="form-control">
                            <option value="1" selected>公開</option>
                            <option value="0">非公開</option>
                        </select>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <div>回答1</div>
                            <span class="h5">たこ焼き</span>
                        </li>
                        <li class="mb-3">
                            <div>回答2</div>
                            <span class="h5">お好み焼き</span>
                        </li>
                        <li class="mb-3">
                            <div>回答3</div>
                            <span class="h5">明石焼き</span>
                        </li>
                        <li class="mb-3">
                            <div>回答4</div>
                            <span class="h5">焼きそば</span>
                        </li>
                        <li class="mb-3">
                            <div>回答5</div>
                            <span class="h5">たいやき</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="pe-3">
                                <input type="submit" value="送信" class="btn btn-primary shadow-sm">
                            </div>
                            <div>
                                <a href="">戻る</a>
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="削除" class="btn btn-danger shadow-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection