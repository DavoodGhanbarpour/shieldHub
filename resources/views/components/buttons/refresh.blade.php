@php
    $title  = isset($title) ? $title : 'Refresh';
    $class  = isset($class) ? $class : '';
    $id     = isset($id) ? $id : 'refreshButton';
    $link   = isset($link) ? $link : '#';
@endphp

<a href="{{$link}}" id="{{$id}}" class="{{$class}} btn btn-azure d-none d-sm-inline-block">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-reload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747"></path>
        <path d="M20 4v5h-5"></path>
     </svg>
    {{$title}}
</a>
