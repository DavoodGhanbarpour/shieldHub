@php
    $datatable = isset($datatable) ? $datatable : '#datatable';
@endphp
<script>
    $(document).ready(function () {

        $('.select2').select2();
        const SEARCH_ELEMENT =
        `<div class="input-icon mb-3 col-md-3">
            <input type="text" id="tableSearchInput" value="" class="form-control" placeholder="{{__('app.pageComponents.search')}}…">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </span>
        </div>`;

        $('#table-default').prepend(SEARCH_ELEMENT);

        if ( !$('{{$datatable}}').length )
            return;

        datatable = $('{{$datatable}}').DataTable({
            stateSave: true,
            paging: false,
            info: false,
            search: {
                search: $("#tableSearchInput").val()
            }
        });

        var searchValue = datatable.state().search.search;
        if (searchValue) {
            $('#tableSearchInput').val(searchValue);
            datatable.search(searchValue).draw();
        }

        datatable.on('draw', function () {
            datatable.state.save();
        });

        $(document).on('keyup', '#tableSearchInput', function () {

            datatable.search($(this).val()).draw();
        });
    });
</script>

@push('styles')
    <style>
        {{$datatable}} thead th {
            position: sticky;
            vertical-align: bottom;
            background: var(--tblr-azure-lt) !important;
            color: rgba(var(--tblr-gray-900-rgb), var(--tblr-bg-opacity));
            text-align: center;
            z-index: 1;
            font-size: 10px;
        }

        table.dataTable {
            border-collapse: collapse;
        }
    </style>
@endpush
