@php
    $id = isset($id) ? $id : 'datatable';
    $class = isset($class) ? $class : '';
@endphp

<table id="{{$id}}" class="{{$class}} table hover table-vcenter display text-center table-bordered">
    {{$slot}}
</table>