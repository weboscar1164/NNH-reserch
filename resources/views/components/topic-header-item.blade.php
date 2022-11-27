<div class="row">
    <div class="col">
        <!-- 左側 -->
        <canvas id="chart" width="400" height="400" data-likes="3" data-dislikes="2"></canvas>
        <style>
        #chart {
            background-color: gray;
        }
        </style>
    </div>
    <div class="col-lg-auto my-5">
        <!-- 右側 -->
        <div>
            <h1>{{ $topic_detail->title}}</h1>
            <span class="mr-1 h5">Posted by テストユーザー</span>
            <span class="mr-1 h5">&bull;</span>
            <span class="h5">36 views</span>
        </div>
        <ul class="list-unstyled container h4">
            @foreach($topic_results as $topic_result)
            <li class="dispray-frex row mt-2">
                <span class="col-8">{{ $topic_result['choice'] }}</span>
                <span class="col-4 text-end">{{ $topic_result['answer'] }}</span>
            </li>
            @endforeach
        </ul>


    </div>
    <form action="" class=" mt-4">
        <span class="h3">あなたは何派？？</span>
        <input type="hidden" name="topic_id" value="3">
        <div class="form-group">
            <textarea class="w-100 border-light" name="body" id="body" rows="5"></textarea>
        </div>

        <div class="container">
            <div class="row h4 form-group">
                <div class="col-auto pl-0">
                    <ul class="list-unstyled">
                        @php
                        $i = 0;
                        @endphp
                        @foreach($topic_results as $topic_result)
                        @php
                        $i++;
                        $input_type = 'answer' . $i;
                        $checked = $i === 1 ? 'checked' : '' ;
                        @endphp

                        <li class="form-check mt-2">
                            <input class="form-check-input" type="radio" id="{{ $input_type }}" name="answer"
                                value="{{ $i }}" {{ $checked }}>
                            <label for="{{ $input_type }}"
                                class="form-check-label pt-1">{{ $topic_result['choice'] }}</label>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <input type="submit" value="送信" class="btn btn-success shadow-sm">
            </div>
        </div>

    </form>
</div>