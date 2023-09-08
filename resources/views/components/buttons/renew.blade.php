@php
    $title = isset($title) ? $title : 'Renew';
    $class = isset($class) ? $class : '';
    $modal = isset($modal) ? $modal : 'renewModal';
@endphp

<a href="#" data-bs-toggle="modal" data-bs-target="#{{$modal}}" class="{{$class}} btn btn-pink d-none d-sm-inline-block">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
     </svg>
    {{$title}}
</a>
