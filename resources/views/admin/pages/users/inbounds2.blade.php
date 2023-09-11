@extends('admin.layout.main')

@section('title', __('app.inbounds.assign_inbounds',['user' => $user->name]))

@section('content')

    <form action="{{ route('admin.users.assignInbounds', ['user' => $user->id]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-5 ps-0">
                <div class="card h-75vh">

                    <div class="card-header">
                        <div class="form-selectgroup">

                            <label class="form-selectgroup-item showAll">
                                <input type="radio" name="servers" value="HTML" class="form-selectgroup-input" checked="checked">
                                <span class="form-selectgroup-label">All</span>
                            </label>

                            @foreach ($servers as $server)
                                <label class="form-selectgroup-item" data-target-item="{{$server->id}}">
                                    <input type="radio" name="servers" value="HTML" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">{{$server->title}} | {{$server->ip}}</span>
                                </label>
                            @endforeach

                        </div>
                    </div>
                    <div class="card-body overflow-auto">
                        <div id="table-default" class="table-responsive">
                            <x-tables.default :class="'tableCheckbox checkboxTrigger'">
                                <thead> 
                                    <tr>
                                        <th>
                                            {{__('app.pageComponents.index')}}
                                        </th>
                                        <th>
                                            {{__('app.general.title')}}
                                        </th>
                                        <th>
                                            {{__('app.general.port')}}
                                        </th>
                                        <th>
                                            {{__('app.general.description')}}
                                        </th>
                                        <th>
                                            {{__('app.general.users_count')}}
                                        </th>
                                        <th>
                                            {{__('app.pageComponents.actions')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @php $index = 1 @endphp
                                    @foreach($inbounds as $eachInbound)
                                        <tr data-id="{{$eachInbound->id}}" class="inbound-card-parent target-id-{{$eachInbound->server_id}}" role="button">
                                            <td class="sort-index">{{$index++}}</td>
                                            <td class="sort-title">{{abbreviation($eachInbound->title)}}</td>
                                            <td class="sort-ip">
                                                {{$eachInbound->port}}
                                            </td>
                                            <td class="sort-description">
                                                {{abbreviation($eachInbound?->description)}}
                                            </td>
                                            <td class="sort-users-count">
                                                {{$eachInbound->active_subscriptions_count}}
                                            </td>
                                            <td class="copy-parent">
                                                <span class="d-none copy-text">{{$eachInbound->link}}</span>

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
                                    @endforeach
                                </tbody>
                            </x-tables.default>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-7 mt-2 mt-md-0 pe-1 ps-0">
                <div class="card h-37vh mb-2">

                    <div class="card-body overflow-auto">
                        <div id="table-default" class="table-responsive">
                            <x-tables.default>
                                <thead>
                                    <tr>
                                        <th>
                                            {{__('app.pageComponents.index')}}
                                        </th>
                                        <th>
                                            {{__('app.general.title')}}
                                        </th>
                                        <th>
                                            {{__('app.servers.server')}}
                                        </th>
                                        <th>
                                            {{__('app.general.start_date')}}
                                        </th>
                                        <th>
                                            {{__('app.general.end_date')}}
                                        </th>
                                        <th>
                                            {{__('app.general.remain')}}
                                        </th>
                                        <th>
                                            {{__('app.general.total')}}
                                        </th>
                                        <th>
                                            {{__('app.general.description')}}
                                        </th>
                                        <th>
                                            {{__('app.pageComponents.actions')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @php $index = 1 @endphp
                                    @foreach($subscriptions as $eachSubscription)
                                        @php $diffDayCount = \Carbon\Carbon::parse($eachSubscription->pivot->start_date)->diffInDays($eachSubscription->pivot->end_date) @endphp
            
                                        <tr>
                                            <td class="sort-index">{{$index++}}</td>
                                            <td class="sort-title">{{$eachSubscription->title}}</td>
                                            <td class="sort-server-title">
                                                {{$eachSubscription->server->title}}
                                                <br>
                                                {{$eachSubscription->server->ip}}:<span class="text-muted">{{$eachSubscription->port}}</span>
                                            </td>
                                            <td class="sort-start-date">{{$eachSubscription->pivot->start_date}}</td>
                                            <td class="sort-end-date">{{$eachSubscription->pivot->end_date}}</td>
                                            <td class="sort-diff">{{$diffDayCount}}</td>
                                            <td class="sort-subscription-price">
                                                {{addSeparator(round($eachSubscription->pivot->subscription_price * $diffDayCount))}}
                                            </td>
                                            <td class="sort-description">{{$eachSubscription->pivot->description}}</td>
                                            <td class="copy-parent">
                                                <span class="d-none copy-text">{{$eachSubscription->link}}</span>

                                                <div class="btn-list flex-nowrap justify-content-center">
                                                    <a href="#" class="btn btn-secondary copy-button my-1 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="#" class="btn btn-danger delete_button my-1 px-2">
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
                                    @endforeach
                                </tbody>
                            </x-tables.default>
                        </div>
                    </div>

                </div>

                <div class="card h-37vh">

                    <div class="card-body overflow-auto">
                        <div id="table-default" class="table-responsive">
                            <x-tables.default>
                                <thead>
                                    <tr>
                                        <th>
                                            {{__('app.pageComponents.index')}}
                                        </th>
                                        <th>
                                            {{__('app.general.date')}}
                                        </th>
                                        <th>
                                            {{__('app.general.description')}}
                                        </th>
                                        <th>
                                            {{__('app.general.credit')}}
                                        </th>
                                        <th>
                                            {{__('app.general.debit')}}
                                        </th>
                                        <th>
                                            {{__('app.pageComponents.actions')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @php
                                        $index = 1;
                                        $credits = 0;
                                        $debits = 0;
                                    @endphp
                                    @foreach($invoices as $eachInvoice)
                                        <tr>
                                            <td class="sort-index">{{$index++}}</td>
                                            <td class="sort-date">{{$eachInvoice->date}}</td>
                                            <td class="sort-description">{{$eachInvoice->description}}</td>
                                            <td class="sort-credit">{{addSeparator($eachInvoice->credit)}}</td>
                                            <td class="sort-debit">{{addSeparator($eachInvoice->debit)}}</td>
                                            <td>
                                                <div class="btn-list flex-nowrap justify-content-center">
                                                    <a href="{{ route('admin.invoices.edit', ['invoice' => $eachInvoice->id]) }}" target="blank" class="btn btn-primary my-1 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                            <path d="M13.5 6.5l4 4"></path>
                                                        </svg>
                                                    </a>
                                                    
                                                    <a href="#" data-id="{{$eachInvoice->id}}" class="btn btn-danger delete_button my-1 px-2">
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
                                        @php
                                            $debits += $eachInvoice->debit;
                                            $credits += $eachInvoice->credit;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">{{__('app.general.total')}}:</td>
                                        <td class="text-center">{{addSeparator($credits)}}</td>
                                        <td class="text-center">{{addSeparator($debits)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">{{__('app.general.remain')}}:</td>
                                        <td class="text-center" colspan="2">{{addSeparator(abs($credits - $debits))}}</td>
                                    </tr>
                                    <x-general.remaining :colspan="5" :price="($credits - $debits)"/>
                                </tfoot>
                            </x-tables.default>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>

    <x-scripts.copy/>
    <x-scripts.datatable-search :searchCol="'col-md-8'">
        <div class="btn-group input-icon mb-3 col-md-4 d-flex justify-content-end subscriptionSubmitButton d-none" 
            data-select-type="one-select" role="group" aria-label="Basic example">
            <a href="#" class="btn btn-info px-2 w-60">
                ثبت
            </a>

            <a href="#" class="btn pe-none btn-secondary px-2 w-40">
                <strong class="me-1">1</strong>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            </a>
        </div>

        <div class="btn-group input-icon mb-3 col-md-4 d-flex justify-content-end subscriptionSubmitButton d-none"
            data-select-type="multi-select" role="group" aria-label="Basic example">
            <a href="#" class="btn btn-info px-2 w-60">
                ثبت
            </a>

            <a href="#" class="btn pe-none btn-secondary px-2 w-40">
                <strong class="me-1" id="countDisplay">2</strong>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks mx-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 12l5 5l10 -10"></path>
                    <path d="M2 12l5 5m5 -5l5 -5"></path>
                </svg>
            </a>
        </div>
    </x-scripts.datatable-search>
    <x-scripts.table-checkbox/>
    <x-libs.pwt-datepicker/>


    @push('scripts')

        <script>
            $(document).ready(function () {

                setInboundsStatus();
            });

            $(document).on('click', '.inbound-card .card-body', function (e) {

                if ($(e.target).is('div.copy-button'))
                    return;

                $(this).closest('.inbound-card').toggleClass('card-active');
                setInboundStatus($(this).closest('.inbound-card'));
            });

            $(document).on( 'click', '.form-selectgroup-item', function(){

                if ( $(this).hasClass('showAll') ) {

                    $('.inbound-card-parent').removeClass('d-none');
                    return;
                }

                $('.inbound-card-parent').addClass('d-none');
                $(`.target-id-${$(this).data('target-item')}`).removeClass('d-none');
            });
            
            $(document).on( 'click', '.delete_button', function(){
            
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
                        // $(this).closest('form').find('.submit_button').click();
                    }
                })
            });

            $(document).on( 'change', '.table-checkbox, #checkAll', function(){
            
                let count = $('.table-checkbox:checked').length;
                $('#countDisplay').text((count == $('.table-checkbox').length) ? 'All' : count);
                $('.subscriptionSubmitButton').addClass('d-none');
                if ( count == 1 )
                    $('[data-select-type="one-select"]').removeClass('d-none');

                else if ( count > 1 )
                    $('[data-select-type="multi-select"]').removeClass('d-none');
            });

            
            function setInboundStatus(element) {

                element.find('.inbound-checkbox').prop('checked', element.hasClass('card-active'));
                element.find('.inbound-checkbox').prop('disabled', !element.hasClass('card-active'));
                element.find('select, input, textarea').prop('disabled', !element.hasClass('card-active'));

                if ( element.hasClass('card-active') )
                    element.find('.card-footer').collapse('show');
                else
                    element.find('.card-footer').collapse('hide');
            }

            function setInboundsStatus() {

                $('.inbound-card').each(function () {
                    setInboundStatus($(this));
                })
            }

        </script>
    @endpush

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
