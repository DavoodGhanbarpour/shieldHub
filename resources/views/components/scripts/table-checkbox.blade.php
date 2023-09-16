<script>
    $(document).ready(function () {

        setAllTablesCheckbox();
    });
    
    const TH_CHECKBOX = `<th class="w-1">
                            <input class="checkAll form-check-input m-0 align-middle" type="checkbox">
                        </th>`;
    const TD_CHECKBOX = `<td>
                            <input class="form-check-input table-checkbox m-0 align-middle" type="checkbox">
                        </td>`;

    function setAllTablesCheckbox() {
        
        $('.tableCheckbox').each(function(){

            setTableCheckbox($(this));
        })
    }
    
    function setTableCheckbox(table) {

        table.find('th .checkAll').closest('th').remove();
        table.find('td .table-checkbox').closest('td').remove();
        
        table.find('thead tr:first').prepend(TH_CHECKBOX);
        table.find('tbody tr').prepend(TD_CHECKBOX);
        table.find('tbody tr').each(function() {
            if ( $(this).data('id') != undefined && $(this).data('id') )
            {
                $(this).find('.table-checkbox:first').attr('data-id', $(this).data('id'));
                $(this).find('.table-checkbox:first').addClass($(this).data('class'));
                $(this).find('.table-checkbox:first').attr('name', `tableCheckbox[${$(this).data('id')}]`);
            }
        });
    }

    $(document).on( 'click', '.tableCheckbox.checkboxTrigger tbody tr', function(e){
    
        if ( $(e.target).is($('input[type=checkbox]')) 
            || $(e.target).is($('button')) 
            || $(e.target).is($('a')) 
            || $(e.target).is($('svg'))
            || $(e.target).is($('path')) )
            return;

        $(this).find('.table-checkbox:first').prop('checked', !$(this).find('.table-checkbox:first').is(':checked')).trigger('change');
    });

    $(document).on( 'change', '.table-checkbox', function(){
    
        setCheckAllStatus($(this).closest('.tableCheckbox'));
    });

    $(document).on( 'change', '.checkAll', function(){
    
        setCheckboxesStatus($(this).closest('.tableCheckbox'));
    });

    function setCheckAllStatus(table) {
        
        table.find('.checkAll').prop('indeterminate', false);
        table.find('.checkAll').prop('checked', false);
        if ( table.find('.table-checkbox:not(:checked)').length == 0 )
            table.find('.checkAll').prop('checked', true);

        else if ( table.find('.table-checkbox:checked').length == 0 )
            table.find('.checkAll').prop('checked', false);
        
        else
            table.find('.checkAll').prop('indeterminate', true);
    }

    function setCheckboxesStatus(table) {
        
        table.find('.table-checkbox').prop('checked', table.find('.checkAll').is(':checked'));
    }

</script>