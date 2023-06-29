@php
    $title = isset($title) ? $title : __('app.pageComponents.cancel');
    $link = isset($link) ? $link : url()->previous();
@endphp
<a href="{{$link}}" class="btn btn-link">{{$title}}</a>