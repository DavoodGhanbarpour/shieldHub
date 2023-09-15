<script>
    $(document).ready(function () {

        setTableCheckbox();
    });
    
    const TH_CHECKBOX = `<th class="w-1">
                            <input id="checkAll" class="form-check-input m-0 align-middle" type="checkbox">
                        </th>`;
    const TD_CHECKBOX = `<td>
                            <input class="form-check-input table-checkbox m-0 align-middle" type="checkbox">
                        </td>`;

    function setTableCheckbox() {

        $('th #checkAll').closest('th').remove();
        $('td .table-checkbox').closest('td').remove();
        
        $('.tableCheckbox thead tr:first').prepend(TH_CHECKBOX);
        $('.tableCheckbox tbody tr').prepend(TD_CHECKBOX);
        $('.tableCheckbox tbody tr').each(function() {
            if ( $(this).data('id') != undefined && $(this).data('id') )
            {
                $(this).find('.table-checkbox:first').attr('data-id', $(this).data('id'));
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