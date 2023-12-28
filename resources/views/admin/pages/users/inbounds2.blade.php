@extends('admin.layout.main')

@section('head')
    <meta name="_token" content="{{csrf_token()}}">
@endsection

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <x-buttons.refresh/>
        </div>
    </div>
@endsection

@section('title', __('app.inbounds.assign_inbounds',['user' => $user->name]))

@section('content')

    <div class="row">
        <div class="col-md-4 ps-0">
            <div class="card h-75vh">

                <div class="card-header">
                    <div class="row">
                        <x-ribbon.default :searchID="'inboundsSearch'" :searchCol="'col-md-8'">
                            <div class="btn-group input-icon mb-3 col-md-4 d-flex justify-content-end subscriptionSubmitButton d-none" 
                                data-select-type="one-select" role="group" aria-label="Basic example">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#subscriptionsModal" class="btn btn-info px-2 w-65">
                                    Submit
                                </a>

                                <a href="#" class="btn pe-none btn-secondary px-2 w-35">
                                    <strong class="me-2">1</strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="btn-group input-icon mb-3 col-md-4 d-flex justify-content-end subscriptionSubmitButton d-none"
                                data-select-type="multi-select" role="group" aria-label="Basic example">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#subscriptionsModal" class="btn btn-info px-2 w-65">
                                    Submit
                                </a>

                                <a href="#" class="btn pe-none btn-secondary px-2 w-35">
                                    <strong class="me-2" id="countDisplay">2</strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 12l5 5l10 -10"></path>
                                        <path d="M2 12l5 5m5 -5l5 -5"></path>
                                    </svg>
                                </a>
                            </div>
                        </x-ribbon.default>

                        <div id="servers" class="form-selectgroup"></div>
                    </div>
                </div>
                <div class="card-body overflow-auto pt-0">
                    <div id="inbounds-table-container" class="table-responsive">
                        <x-tables.default :id="'inboundsTable'" :class="'tableCheckbox justVisiblesMode checkboxTrigger inboundsTable'">
                            <thead> 
                                <tr>
                                    <th class="w-10">
                                        {{__('app.pageComponents.index')}}
                                    </th>
                                    <th class="w-43">
                                        {{__('app.general.title')}}
                                    </th>
                                    <th class="w-15">
                                        {{__('app.general.port')}}
                                    </th>
                                    <th class="w-15">
                                        {{__('app.general.users_count')}}
                                    </th>
                                    <th class="w-12">
                                        {{__('app.pageComponents.actions')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                            </tbody>
                        </x-tables.default>
                    </div>
                </div>

            </div>
        </div>

        
        
        <div class="col-md-8 mt-2 mt-md-0 pe-1 ps-0">
            <div class="card h-37vh mb-2">
                <div class="card-header pb-0">
                    <div class="col-12">
                        <div class="row">

                            <x-ribbon.default :searchID="'subscriptionsSearch'" :containerClass="'justify-content-between'" :searchCol="'col-md-4'">
                                <li>
                                    <x-buttons.renew/>
                                </li>
                            </x-ribbon.default>

                        </div>
                    </div>
                </div>

                <div class="card-body overflow-auto pt-0">
                    <div id="subscriptions-table-container" class="table-responsive">
                        <x-tables.default :id="'subscriptionsTable'" :class="'tableCheckbox checkboxTrigger  subscriptionsTable'">
                            <thead>
                                <tr>
                                    <th class="w-4">
                                        {{__('app.pageComponents.index')}}
                                    </th>
                                    <th class="w-15">
                                        {{__('app.general.title')}}
                                    </th>
                                    <th class="w-15">
                                        {{__('app.servers.server')}}
                                    </th>
                                    <th class="w-9">
                                        {{__('app.general.start_date')}}
                                    </th>
                                    <th class="w-9">
                                        {{__('app.general.end_date')}}
                                    </th>
                                    <th class="w-6">
                                        {{__('app.general.remain')}}
                                    </th>
                                    <th class="w-7">
                                        {{__('app.general.total')}}
                                    </th>
                                    <th class="w-20">
                                        {{__('app.general.description')}}
                                    </th>
                                    <th class="w-11">
                                        {{__('app.pageComponents.actions')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                            </tbody>
                        </x-tables.default>
                    </div>
                    
                    <x-modals.renew :action="'javascript:void(0);'" :type="'button'"/>
                </div>

            </div>

            <div class="card h-37vh">

                <div class="card-header pb-0">
                    <div class="col-12">
                        <div class="row">

                            <x-ribbon.default :searchID="'invoicesSearch'" :containerClass="'justify-content-between'" :searchCol="'col-md-4'">
                                <li>
                                    <x-buttons.add :link="route('admin.invoices.create', ['userID' => $user->id])" :target="'_blank'" :title="__('app.pageComponents.add') .' '. __('app.invoices.invoice')"/>
                                </li>
                            </x-ribbon.default>

                        </div>
                    </div>
                </div>

                <div class="card-body overflow-auto pt-0">
                    <div id="table-default" class="table-responsive">
                        <x-tables.default :id="'invoicesTable'" :class="'invoicesTable'">
                            <thead>
                                <tr>
                                    <th class="w-6">
                                        {{__('app.pageComponents.index')}}
                                    </th>
                                    <th class="w-15">
                                        {{__('app.general.date')}}
                                    </th>
                                    <th class="w-44">
                                        {{__('app.general.description')}}
                                    </th>
                                    <th class="w-12">
                                        {{__('app.general.credit')}}
                                    </th>
                                    <th class="w-12">
                                        {{__('app.general.debit')}}
                                    </th>
                                    <th class="w-11">
                                        {{__('app.pageComponents.actions')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">{{__('app.general.total')}}:</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">{{__('app.general.remain')}}:</td>
                                    <td class="text-center" colspan="2"></td>
                                </tr>
                            </tfoot>
                        </x-tables.default>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal" id="subscriptionsModal" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subscriptions Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="btn-group w-100" role="group">
                        <input data-target="#separatelyForm" type="radio" class="btn-check subscriptionFillType" name="btn-radio-basic" id="separately" autocomplete="off" checked="">
                        <label for="separately" type="button" class="btn">Separately</label>

                        <input data-target="#asOneForm" type="radio" class="btn-check subscriptionFillType" name="btn-radio-basic" id="asOne" autocomplete="off">
                        <label for="asOne" type="button" class="btn">As One</label>
                    </div>
                    <hr class="my-4 mx-0">

                    <div id="separatelyForm" class="suscription-form mb-3">
                    </div>
                        
                    <div id="asOneForm" class="row suscription-form">

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">{{__('app.general.start_date')}}</label>
                            <div>
                                <input type="text"
                                    name="start_date"
                                    class="form-control datepicker"
                                    placeholder="{{__('app.general.start_date')}}">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">{{__('app.general.end_date')}}</label>
                            <div>
                                <input type="text"
                                    name="end_date"
                                    class="form-control datepicker"
                                    placeholder="{{__('app.general.end_date')}}">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">{{__('app.general.subscription_price')}}</label>
                            <div>
                                <input type="text"
                                    name="subscription_price"
                                    class="form-control number_format"
                                    placeholder="{{__('app.general.subscription_price')}}">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{__('app.general.description')}}</label>
                            <div>
                                <textarea name="description" rows="1" class="form-control resize-none"
                                    placeholder="{{__('app.general.description')}}"></textarea>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <x-buttons.submit data-bs-dismiss="modal" :type="'button'"/>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-3 d-none inboundItem" id="separatelyFormSample">
        <div class="card-header">
            <strong class="formTitle">
            </strong>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.start_date')}}</label>
                    <div>
                        <input type="text"
                            name="start_date"
                            class="form-control datepicker"
                            placeholder="{{__('app.general.start_date')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.end_date')}}</label>
                    <div>
                        <input type="text"
                            name="end_date"
                            class="form-control datepicker"
                            placeholder="{{__('app.general.end_date')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.subscription_price')}}</label>
                    <div>
                        <input type="text"
                            name="subscription_price"
                            class="form-control number_format"
                            placeholder="{{__('app.general.subscription_price')}}">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">{{__('app.general.description')}}</label>
                    <div>
                        <textarea name="description" rows="1" class="form-control resize-none"
                            placeholder="{{__('app.general.description')}}"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-scripts.copy/>

    <x-scripts.datatable :datatable="'#inboundsTable'" :search="'#inboundsSearch'"/>
    <x-scripts.datatable :datatable="'#subscriptionsTable'" :search="'#subscriptionsSearch'"/>
    <x-scripts.datatable :datatable="'#invoicesTable'" :search="'#invoicesSearch'"/>
    <x-scripts.table-checkbox/>
    <x-libs.pwt-datepicker/>

    @push('scripts')

    <script>
            $(document).ready(function () {

                const TOKEN = $('meta[name="_token"]').attr('content');
                axios.defaults.headers.common['X-Requested-With']   = 'XMLHttpRequest';
                axios.defaults.headers.common['X-CSRF-TOKEN']       = TOKEN;
                setTablesData();
            });

            function setLoading(status = true) {

                if ( status ) {
                    
                    const tempRows = (tableID) => {
                        if ( $(`#${tableID} tbody tr`).length >= 20 )
                            return '';

                        return Array((20 - $(`#${tableID} tbody tr`).length)).fill('<tr class="odd loading-tr"><td colspan="100%">&nbsp;<br>&nbsp;</td></tr>');
                    }

                    $('#inboundsTable tbody').append(tempRows('inboundsTable'));
                    $('#subscriptionsTable tbody').append(tempRows('subscriptionsTable'));
                    $('#invoicesTable tbody').append(tempRows('invoicesTable'));

                    $('#inboundsTable, #subscriptionsTable, #invoicesTable').addClass('table-loading');
                } else {

                    setTimeout(() => {
                        
                        $('#inboundsTable, #subscriptionsTable, #invoicesTable').find('.loading-tr').remove();
                        $('#inboundsTable, #subscriptionsTable, #invoicesTable').removeClass('table-loading');
                    }, 500);
                }
            }

            async function setTablesData() {
                
                setLoading(true);
                await setInboundsTableData();
                await setSubscriptionsTableData();
                await setInvoicesTableData();
                setSeletedInboundsHandler();
                setAllTablesCheckbox();
                setRenewModalHandlerStatus();
                setLoading(false);
            }

            $(document).on( 'click', '.server-select', function(){

                if ( $(this).hasClass('showAll') ) {

                    $('.inbound-card-parent').removeClass('d-none');
                    return;
                }

                $('.inbound-card-parent').addClass('d-none');
                $(`.target-id-${$(this).data('target-item')}`).removeClass('d-none');
            });

            $(document).on( 'click', '#refreshButton', setTablesData);
            
            function validateSelectedInbounds() {
                
                if ( $('.inboundsTable .table-checkbox.isAttachedToUser:checked').length )
                    toastr.error('Some of the selected inbounds are already attached to user and cannot attach again!');
                
                $('.inboundsTable .table-checkbox.isAttachedToUser:checked').prop('checked', false);
                $('.inboundsTable .table-checkbox:not(".isAttachedToUser"):first').trigger('change');
            }

            function isAttachedToUser(checkbox) {

                if ( checkbox.hasClass('isAttachedToUser') && checkbox.is(':checked') ) {
                    toastr.error('This inbound is already attached to user and cannot attach again!');
                    checkbox.prop('checked', false).trigger('change');
                    return true;
                }
                return false;
            }
            
            $(document).on( 'change', '.inboundsTable .table-checkbox, .inboundsTable .checkAll', function(){
            
                if ( isAttachedToUser($(this)) )
                    return;

                setSeletedInboundsHandler();
            });

            function setSeletedInboundsHandler() {
                
                let count = $('.inboundsTable .table-checkbox:checked').length;
                $('#countDisplay').text((count == $('.inboundsTable .table-checkbox').length) ? 'All' : count);
                $('.subscriptionSubmitButton').addClass('d-none');
                if ( count == 1 )
                    $('[data-select-type="one-select"]').removeClass('d-none');

                else if ( count > 1 )
                    $('[data-select-type="multi-select"]').removeClass('d-none');
            }

            $(document).on( 'shown.bs.modal', '#subscriptionsModal', function(){
            
                validateSelectedInbounds();
                if ( $('.inboundsTable .table-checkbox:checked').length == 0 ) {

                    $('#subscriptionsModal').modal('hide');
                    return;
                }
                
                setSuscriptionForm();
                $(".datepicker").pDatepicker({calendarType: 'gregorian', format: 'L', autoClose: true, initialValue: false});
                setSuscriptionFormStatus();
            });

            $(document).on( 'change', '.subscriptionFillType', function(){
        
                setSuscriptionFormStatus();
            });

            function setSuscriptionForm() {

                $('#separatelyForm').html('');
                $('.inboundsTable .table-checkbox:checked').each(function(){
                    const id        = $(this).attr('data-id');
                    const title     = $(this).closest('tr').find('.title').text();
                    const form      = $('#separatelyFormSample').clone().removeAttr('id').attr('data-id', id).removeClass('d-none');
                    const startDate = $(this).closest('tr').data('default-start-date');
                    const endDate   = $(this).closest('tr').data('default-end-date');
                    const price     = $(this).closest('tr').data('default-price');

                    form.find('input[name="start_date"]').val(startDate.replaceAll('-', '/'));
                    form.find('input[name="end_date"]').val(endDate.replaceAll('-', '/'));
                    form.find('input[name="subscription_price"]').val(number_format(price));
                    form.find('.formTitle').text(title);

                    $('#separatelyForm').append(form);
                });
            }
            
            function setSuscriptionFormStatus() {

                let element = $($('.subscriptionFillType:checked').data('target'));
                $('.suscription-form').addClass('d-none');
                element.removeClass('d-none');

                $('.suscription-form').find('input, select').prop('disabled', true);
                element.find('input, select').prop('disabled', false);
            }
            
            $(document).on( 'click', '#subscriptionsModal #submitButton', function(){
            
                attachInboundsHandler();
            });

            async function attachInboundsHandler() {
                
                await attachInbounds();
                setTablesData();
            }

            async function attachInbounds() {

                try {
                    const result = await axios.post(
                        '{{route("admin.users.inbounds.create", ["user" => $user->id])}}', {
                            inbounds: await getSelectedInbounds(),
                        }
                    ).then(function(response){

                        if ( response.data.status != 'success' ) {

                            toastr.error('Subscription(s) adding failed!');
                        } else {
                            toastr.success('Subscription(s) added successfully');
                        }
                    }).catch(function(error) {
                        toastr.error(error?.response?.data?.message);
                        toastr.error('Subscription(s) adding failed!');
                    });

                } catch (error) {

                    console.log('attachInbounds error', error);
                    return false;
                }
            }

            function getSelectedInbounds() {

                const inbounds = {};
                if ( isSeparately() ) {
                    
                    $('#separatelyForm .inboundItem').each(function(){
                        
                        var inputs = {};
                        $(this).find('input, select, textarea').each(function(){
                            inputs[$(this).attr('name')] = $(this).val();
                        });
                        inputs = {...inputs, inbound_id: $(this).data('id')};
                        inbounds[$(this).data('id')] = inputs;
                    })
                } else {
                    
                    var inputs = {};
                    $('#asOneForm').find('input, select, textarea').each(function(){
                        inputs[$(this).attr('name')] = $(this).val();
                    });
                    $('#separatelyForm .inboundItem').each(function(){
                        inputs = {...inputs, inbound_id: $(this).data('id')};
                        inbounds[$(this).data('id')] = inputs;
                    })
                }

                return inbounds;
            }

            function isSeparately() {

                return $('#separately').is(':checked');
            }
            
            
        /* Inbounds begin */
            async function setInboundsTableData() {

                const {inbounds, servers} = await getInbounds();
                setInbounds(inbounds);
                setServers(servers);
            }
            
            async function getInbounds() {

                try {
                    const result = await axios.get('{{route("admin.users.inbounds.json", ["user" => $user->id])}}');
                    return result.data;
                } catch (error) {
                    console.log('getInbounds error', error);
                }
            }
            
            const serversContainer = $('#servers');
            function setServers(servers) {

                serversContainer.html('');
                serversContainer.append(`
                    <label class="form-selectgroup-item server-select showAll">
                        <input type="radio" name="servers" value="HTML" class="form-selectgroup-input" checked="checked">
                        <span class="form-selectgroup-label">All</span>
                    </label>`);

                servers.forEach(server => {
                    
                    serversContainer.append(`
                        <label class="form-selectgroup-item server-select" data-target-item="${server.id}">
                            <input type="radio" name="servers" value="HTML" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">${server.title} | ${server.ip}</span>
                        </label>`);
                });
            }

            function setInbounds(inbounds) {

                $('.inboundsTable tbody').html('');
                resetDatatable($('#inboundsTable'));
                let index = 1;
                inbounds.forEach(inbound => {
                    
                    $('.inboundsTable tbody').append(`
                        <tr data-id="${inbound?.inbound?.id}" 
                            data-default-start-date="${inbound?.inbound?.defaultStartDate}" 
                            data-default-end-date="${inbound?.inbound?.defaultEndDate}" 
                            data-default-price="${inbound?.inbound?.defaultPrice}" 
                            data-class="${inbound?.inbound?.isAttachedToUser ? 'isAttachedToUser' : ''}"
                            class="inbound-card-parent target-id-${inbound?.server?.id}">
                            <td class="sort-index">${index++}</td>
                            <td class="sort-title title">${inbound?.inbound?.title}</td>
                            <td class="sort-ip">${inbound?.inbound?.port}</td>
                            <td class="sort-users-count">${inbound?.inbound?.activeSubscriptions}</td>
                            <td class="copy-parent">
                                <span class="d-none copy-text">${inbound?.inbound?.link}</span>

                                <div class="btn-list flex-nowrap justify-content-center">
                                    <a href="#" class="btn btn-secondary copy-button my-1 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    `);
                });
                setTableCheckbox($('#inboundsTable'));
                initializeDatatable($('#inboundsTable'), '#inboundsSearch');
            }

        /* Inbounds end */


        /* Subscriptions begin */
            async function setSubscriptionsTableData() {

                const {subscriptions} = await getSubscriptions();
                setSubscriptions(subscriptions);
            }
            
            async function getSubscriptions() {

                try {
                    const result = await axios.get('{{route("admin.users.subscriptions.json", ["user" => $user->id])}}');
                    return result.data;
                } catch (error) {
                    console.log('getSubscriptions error', error);
                }
            }

            function setSubscriptions(subscriptions) {

                $('#subscriptionsTable tbody').html('');
                resetDatatable($('#subscriptionsTable'));
                let index = 1;
                subscriptions.forEach(subscription => {
                    
                    let deleteButton = '';
                    if ( subscription.is_active )
                        deleteButton = `
                        <a href="#" data-id="${subscription?.subscription_id}" class="btn btn-danger subscriptionDelete my-1 px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0"></path>
                                <path d="M10 11l0 6"></path>
                                <path d="M14 11l0 6"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </a>`;

                    $('.subscriptionsTable tbody').append(`
                        <tr>
                            <td class="sort-index">${index++}</td>
                            <td class="sort-title">${subscription?.inbound?.title}</td>
                            <td class="sort-server-title">
                                ${subscription?.server?.title}
                                <br>
                                ${subscription?.server?.ip}:<span class="text-muted">${subscription?.inbound?.port}</span>
                            </td>
                            <td class="sort-start-date">${subscription?.start_date}</td>
                            <td class="sort-end-date">${subscription?.end_date}</td>
                            <td class="sort-diff">${subscription?.remaining_days}</td>
                            <td class="sort-subscription-price">
                                ${number_format(subscription?.total_price)}
                            </td>
                            <td class="sort-description">${subscription?.description || ''}</td>
                            <td class="copy-parent">
                                <span class="d-none copy-text">${subscription?.inbound?.link}</span>

                                <div class="btn-list flex-nowrap justify-content-center">
                                    <a href="#" class="btn btn-secondary copy-button my-1 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                                        </svg>
                                    </a>

                                    ${deleteButton}
                                </div>
                            </td>
                        </tr>
                    `);
                });
                setTableCheckbox($('#subscriptionsTable'));
                initializeDatatable($('#subscriptionsTable'), '#subscriptionsSearch');
            }
        /* Subscriptions end */


        /* Invoices begin */
            async function setInvoicesTableData() {

                const {invoices} = await getInvoices();
                setInvoices(invoices);
            }
            
            async function getInvoices() {

                try {
                    const result = await axios.get('{{route("admin.users.invoices.json", ["user" => $user->id])}}');
                    return result.data;
                } catch (error) {
                    console.log('getInvoices error', error);
                }
            }

            function setInvoices(invoices) {
                
                $('#invoicesTable tbody').html('');
                $('#invoicesTable tfoot').html('');
                resetDatatable($('#invoicesTable'));
                let index = 1;
                let credits = 0;
                let debits = 0;
                invoices.forEach(invoice => {
                    
                    credits += (invoice?.credit ?? 0);
                    debits += (invoice?.debit ?? 0);

                    $('.invoicesTable tbody').append(`
                        <tr>
                            <td class="sort-index">${index++}</td>
                            <td class="sort-date">${invoice?.created_at}</td>
                            <td class="sort-description">${invoice?.description || ''}</td>
                            <td class="sort-credit">${number_format(invoice?.credit)}</td>
                            <td class="sort-debit">${number_format(invoice?.debit)}</td>
                            <td>
                                <div class="btn-list flex-nowrap justify-content-center">
                                    <a href="#" target="blank" class="btn btn-primary my-1 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <path d="M13.5 6.5l4 4"></path>
                                        </svg>
                                    </a>
                                    
                                    <a href="#" data-id="${invoice?.id}" class="btn btn-danger delete_button my-1 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    `);
                });

                $('#invoicesTable tfoot').append(`
                    <tr>
                        <td colspan="3">{{__('app.general.total')}}:</td>
                        <td class="text-center">${number_format(credits)}</td>
                        <td class="text-center">${number_format(debits)}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">{{__('app.general.remain')}}:</td>
                        <td class="text-center" colspan="2">${number_format(credits - debits)}</td>
                        <td></td>
                    </tr>
                    ${getInvoicesFooter(credits - debits)}
                `);
                initializeDatatable($('#invoicesTable'), '#invoicesSearch');
            }

            function getInvoicesFooter(price) {

                let firstPrice = price;
                price = number_format(Math.abs(price));
                let title = "{{__('app.general.you_dont_have_credit_or_debt')}}";
                let bgClass = "";

                if ( firstPrice < 0 )
                {
                    title = `Your account has (<span class='fw-bold'>${price}</span>) debt`;
                    bgClass = 'text-danger';
                }
                else if ( firstPrice > 0 )
                {
                    title = `Your account has (<span class='fw-bold'>${price}</span>) credit`;
                    bgClass = 'text-success';
                }

                return `<tr class="${bgClass}">
                            <td colspan="6">
                                ${title}.
                            </td>
                        </tr>`;
            }
        /* Invoices end */

            $(document).on( 'click', '.subscriptionDelete', function(){
            
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        detachInbound($(this).data('id')).then(setTablesData);
                    }
                })
            });
            
            const DETACH_ROUTE = '{{route("admin.users.inbounds.delete", ["user" => $user->id, "subscription" => "SUBSCRIPTION_ID"])}}'
            
            async function detachInbound(subscription) {
                
                const result = await axios.delete(
                    DETACH_ROUTE.replaceAll("SUBSCRIPTION_ID", subscription)
                ).then(function(response){

                    if ( response.data.status != 'success' ) {

                        toastr.error('Subscription deletion failed!');
                    } else {
                        toastr.success('Subscription deleted successfully');
                    }
                }).catch(function(error) {
                    
                    toastr.error(error?.response?.data?.message);
                    toastr.error('Subscription deletion failed!');
                });
                return;
            }
            
            $(document).on( 'click', '[data-bs-target="#renewModal"]', function(){
                $('#renewModal #hiddenFormInputs').html('');
                $('#renewModal #hiddenFormInputs').append($('.subscriptionsTable .table-checkbox:checked').clone());
            });

        </script>
    @endpush

    <script>

        $(document).ready( function(){

            setRenewModalHandlerStatus()
        });
        
        $(document).on( 'change', '.subscriptionsTable .checkAll, .subscriptionsTable .table-checkbox', function(){
            setRenewModalHandlerStatus()
        });

        function setRenewModalHandlerStatus() {
            if ( $('.subscriptionsTable .table-checkbox:checked').length == 0 )
                $('[data-bs-target="#renewModal"]').addClass('disabled');
            else
                $('[data-bs-target="#renewModal"]').removeClass('disabled');
        }

        $(document).on( 'click', '#renewModal #submitButton', function(e){
        
            e.preventDefault();
        });

    </script>

    @push('styles')
        <style>
            .ribbon-container .ribbon:nth-of-type(1) {
                top: 0.75rem;
            }

            .ribbon-container .ribbon:nth-of-type(2) {
                top: 2.9rem;
            }

            .copy-button {
                cursor: copy;
            }
            .inbound-card {
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            .form-selectgroup-label {
                color: var(--tblr-gray-500-darken);
            }

            .card-footer {
                background-color: var(--tblr-dark-lt);
            }

            .h-75vh {
                height: 75vh;
            }

            .h-37vh {
                height: 37vh;
            }

            table.dataTable thead > tr > th.sorting::before, table.dataTable thead > tr > th.sorting_asc::before, table.dataTable thead > tr > th.sorting_desc::before, table.dataTable thead > tr > th.sorting_asc_disabled::before, table.dataTable thead > tr > th.sorting_desc_disabled::before, table.dataTable thead > tr > td.sorting::before, table.dataTable thead > tr > td.sorting_asc::before, table.dataTable thead > tr > td.sorting_desc::before, table.dataTable thead > tr > td.sorting_asc_disabled::before, table.dataTable thead > tr > td.sorting_desc_disabled::before, 
            table.dataTable thead > tr > th.sorting::after, table.dataTable thead > tr > th.sorting_asc::after, table.dataTable thead > tr > th.sorting_desc::after, table.dataTable thead > tr > th.sorting_asc_disabled::after, table.dataTable thead > tr > th.sorting_desc_disabled::after, table.dataTable thead > tr > td.sorting::after, table.dataTable thead > tr > td.sorting_asc::after, table.dataTable thead > tr > td.sorting_desc::after, table.dataTable thead > tr > td.sorting_asc_disabled::after, table.dataTable thead > tr > td.sorting_desc_disabled::after {
                display: none;
            }

            .sorting {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .table > :not(caption) > * > *, .markdown > table > :not(caption) > * > * {
                padding: .25rem !important;            
            }

            .card-body,
            .card-header,
            .card-footer {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        </style>
    @endpush

@endsection
