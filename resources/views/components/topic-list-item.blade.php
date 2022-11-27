@php
$published_label = $topic->published ? '公開' : '非公開';
$published_cls = $topic->published ? 'bg-primary' : 'bg-danger';
@endphp

<li class="topic row bg-white shadow-sm mb-3 rounded p-3">
    <div class="col-md d-flex align-items-center">
        <h2 class="mb-2 mb-md-0">
            @if(!$is_home)
            <span class="badge mr-1 align-bottom {{ $published_cls }}">{{ $published_label }}</span>
            @endif
            <a class="text-body" href="">{{ $topic->title }}</a>
        </h2>
    </div>
    <div class="view col-auto min-w-100 text-center">
        <div class="h1 mb-0">{{ $topic->views }}</div>
        <div class="mb-0">Views</div>
    </div>
</li>