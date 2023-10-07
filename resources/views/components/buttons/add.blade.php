@php
    $lastSegment = request()->segment(count(request()->segments()));
    $title = isset($title) ? $title : __("app.pageComponents.add");
    $link = isset($link) ? $link : route("admin.$lastSegment.create");
    $class = isset($class) ? $class : '';
    $target = isset($target) ? $target : '_self';
@endphp
<a href="{{$link}}" target="{{$target}}" class="{{$class}} btn btn-success d-none d-sm-inline-block">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M12 5l0 14"/>
        <path d="M5 12l14 0"/>
    </svg>
    {{$title}}
</a>