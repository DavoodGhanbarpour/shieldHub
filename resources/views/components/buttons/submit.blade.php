@php
    $title = isset($title) ? $title : __('app.pageComponents.submit');
    $type = isset($type) ? $type : 'submit';
@endphp
<button id="submitButton" type="{{$type}}" {{$attributes}} class="btn btn-primary ms-auto">{{$title}}</button>