<div class="row">
    <div class="col">
        <!-- 左側 -->
        <canvas id="chart" width="400" height="400"></canvas>

    </div>
    <div class="col-lg-auto my-5">
        <!-- 右側 -->
        <div>
            <h1>{{ $topic_detail->title}}</h1>
            <span class="me-1 h5">Posted by {{ $topic_detail->name}}</span>
            <span class="me-1 h5">&bull;</span>
            <span class="me-1 h5">{{ $topic_detail->views}} views</span>
            <button id="likeButton" class="btn btn--like " onclick="likesButtonClick({{ $topic_detail->id }})">
                <i class="icon ion-md-heart h4"></i>
                <span id="likesCount" class="h5"></span>
            </button>
        </div>
        <ul class="list-unstyled container h4">
            @foreach($topic_results as $topic_result)
            @if($topic_result['choice'] !== null)
            <li class="dispray-frex row mt-2">
                <span class="col-8">{{ $topic_result['choice'] }}</span>
                <span class="col-4 text-end">{{ $topic_result['answer'] }}</span>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    @auth
    @if(!is_null($is_answerd))
    <div class="col mb-5">
        <h2 class="mb-3">回答ありがとうございます！</h2>
        <p>あなたは、<span class="h5">"{{ $data_choice[$is_answerd->answer - 1] }}"</span>  を選択しました。</p>
        <a href="{{ route('comment.delete',['comment_id'=> $is_answerd->id]) }}" class="btn btn-danger shadow-sm col-auto">取り消す</a>
    </div>
    @else
    <form action="{{ route('topic.detail', ['id'=> $topic_detail->id]) }}" class=" mt-4" method="POST">
        @csrf
        <span class="h3">あなたは何派？？</span>
        <input type="hidden" name="topic_id" value="{{ $topic_detail->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="container mb-5">
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
                        @if($topic_result['choice'] !== null)

                        <li class="form-check mt-2">
                            <input class="form-check-input" type="radio" id="{{ $input_type }}" name="answer"
                                value="{{ $i }}" {{ $checked }}>
                            <label for="{{ $input_type }}"
                                class="form-check-label pt-1">{{ $topic_result['choice'] }}</label>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                </div>
                <div class="form-group">
                    <textarea class="w-100 border-light" name="comment_body" rows="5"
                        placeholder="コメントを投稿しましょう！（任意）"></textarea>
                </div>
                <div>
                    <input type="submit" value="送信" class="btn btn-success shadow-sm">
                </div>
            </div>
        </div>
    </form>
    @endif
    @endauth
    @guest
    <div class="my-4 text-center">
        <h2>ログインして投稿しましょう！</h2>
        <a href="{{ route('login') }}" class="btn btn-primary my-4">ログイン画面へ</a>
    </div>
    @endguest
</div>

<script>
const data_choice = @JSON($data_choice);
const data_answer = @JSON($data_answer);
const topicId = @json($topic_detail->id);

let likesCount = @json($likes_results['count']) ;
window.onload = function(){
    likeBtnChange();
}

let likedThisUser = @json($likes_results['liked_this_user']);

function likeBtnChange() {
    let likesStr = likesCount + ' likes';
    isLikedChangeClass();
    document.getElementById('likesCount').innerHTML = likesStr ;

}

function likesButtonClick() {
    if(likedThisUser) {
        
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: `/unlike/${topicId}`,
            type: "POST",
        })
        .done(function(xhr, status, error) {
            console.log('ok');
            likesCount -= 1;
            likedThisUser = false;
            isLikedChangeClass();
            likeBtnChange();
        })
        .fail(function(xhr, status,error) {
            console.log('ng');
        })
        
    }else {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: `/like/${topicId}`,
            type: "POST",
        })
        .done(function(xhr, status, error) {
        likesCount += 1;
        likedThisUser = true;
        console.log('ok');
        isLikedChangeClass();
        likeBtnChange();
    })
    .fail(function(xhr, status,error) {
        console.log('ng');
    })
    }
    isLikedChangeClass();
    likeBtnChange();

    
}

function isLikedChangeClass() {
    if (likedThisUser) {
        document.getElementById('likeButton').classList.remove('btn--like');
        document.getElementById('likeButton').classList.add('btn--liked');
    }else {
        document.getElementById('likeButton').classList.remove('btn--liked');
        document.getElementById('likeButton').classList.add('btn--like');
    }
}



</script>