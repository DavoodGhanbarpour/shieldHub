@php
    $datatable  = isset($datatable) ? $datatable : '#datatable';
    $search     = isset($search) ? $search : '#tableSearch';
@endphp
<script>

    $(document).ready(function () {

        $('.select2').select2();
        try {
            if ( setAllTablesCheckbox != undefined && 
                typeof setAllTablesCheckbox != 'undefined' && 
                typeof setAllTablesCheckbox == 'function' ) {
                    setAllTablesCheckbox();
                }
        } catch (error) {
            console.log('Error: ', error);   
        }

        if ( $.fn.dataTable.isDataTable($('{{$datatable}}')) )
            resetDatatable($('{{$datatable}}'));
        
        initializeDatatable($('{{$datatable}}'), '{{$search}}');
    });

    function resetDatatable(table) {

        if ( !table.length )
            return;

        table.DataTable().clear().destroy();
    }

    function initializeDatatable(table, searchSelector) {

        if ( !table.length )
            return;

        var datatable = table.DataTable({
            stateSave: true,
            paging: false,
            info: false,
            search: {
                search: $(searchSelector).val()
            }
        });

        var searchValue = datatable.state().search.search;
        if (searchValue) {
            $(searchSelector).val(searchValue);
            datatable.search(searchValue).draw();
        }

        datatable.on('draw', function () {
            datatable.state.save();
        });

        $(document).on('keyup', searchSelector, function () {
            
            datatable.search($(this).val()).draw();
        });
    }
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
