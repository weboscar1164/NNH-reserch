@php
$is_home_route = $is_home ? 'topic.detail' : 'topic.edit';
@endphp

<li class="topic row bg-white shadow-sm mb-3 rounded p-3">
    <div class="col-md d-flex align-items-center">
        <h2 class="mb-2 mb-md-0">
            @if(!$is_home)
            <span class="badge mr-1 align-bottom {{ $topic_item->published_class }}">{{ $topic_item->published_label }}</span>
            @endif
            <a class="text-body" href="{{ route($is_home_route, ['topic' => $topic_item->id])}}">{{ $topic_item->title }}</a>
        </h2>
    </div>
    <div class="view col-auto min-w-100 text-center">
        <div class="h1 mb-0">{{ $topic_item->views }}</div>
        <div class="mb-0">Views</div>
    </div>
</li>