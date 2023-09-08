<script>
    $(document).ready(function () {
        const thCheckbox = `<th class="w-1">
                                <input id="checkAll" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices">
                            </th>`;
        const tdCheckbox = `<td>
                                <input class="form-check-input table-checkbox m-0 align-middle" type="checkbox" aria-label="Select invoice">
                            </td>`;

        $('table thead tr:first').prepend(thCheckbox);
        $('table tbody tr').prepend(tdCheckbox);
        $('table tbody tr').each(function() {
            $(this).find('.table-checkbox:first').attr('name', `tableCheckbox[${$(this).data('id')}]`);
        });
    });

    $(document).on( 'change', '.table-checkbox', function(){
    
        setCheckAllStatus();
    });

    $(document).on( 'change', '#checkAll', function(){
    
        setCheckboxesStatus();
    });

    function setCheckAllStatus() {
        
        $('#checkAll').prop('indeterminate', false);
        $('#checkAll').prop('checked', false);
        if ( $('.table-checkbox:not(:checked)').length == 0 )
            $('#checkAll').prop('checked', true);

        else if ( $('.table-checkbox:checked').length == 0 )
            $('#checkAll').prop('checked', false);
        
        else
            $('#checkAll').prop('indeterminate', true);
    }

    function setCheckboxesStatus() {
        
        $('.table-checkbox').prop('checked', $('#checkAll').is(':checked'));
    }

</script>