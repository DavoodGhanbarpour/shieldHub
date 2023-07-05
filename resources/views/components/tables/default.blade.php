@php
    $id = isset($id) ? $id : 'datatable';
@endphp

<table id="datatable" class="table hover table-vcenter display text-center table-bordered">
    {{$slot}}
</table>