@extends('admin.layout.main')

@section('title', __('app.inbounds.assign_inbounds',['user' => $user->name]))

@section('content')

    <form action="{{ route('admin.users.assignInbounds', ['user' => $user->id]) }}" method="POST" class="card">
        @csrf

        <div class="card-header">
            <div class="form-selectgroup form-selectgroup-pills">

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
        <div class="card-body">
            <div class="row">
                @foreach($inbounds as $eachInbound)
                    <div class="col-sm-6 col-xl-3 mb-3 inbound-card-parent data target-id-{{$eachInbound->server_id}}">
                        <div class="card inbound-card copy-parent border-3 {{$eachInbound->subscription_data ? 'card-active' : ''}}" role="button">
                            <input class="d-none inbound-checkbox" value="{{$eachInbound->id}}" type="checkbox" name="inbounds[{{$eachInbound->id}}][inbound_id]">
                            <span class="d-none copy-text">{{$eachInbound->link}}</span>

                            <div class="ribbon-container">
                                @php
                                    if ($eachInbound->active_subscriptions_count > 0)
                                        $BGClass = 'success';
                                    else
                                        $BGClass = 'secondary';
                                @endphp
                                <div class="ribbon w-18 btn btn-primary copy-button">{{__('app.pageComponents.copy')}}</div>
                                <div class="ribbon w-12 btn fw-bold fs-4 border-{{$BGClass}} bg-{{$BGClass}} btn-{{$BGClass}}">{{$eachInbound->active_subscriptions_count}}</div>
                            </div>
                            <div class="card-body">
                                <p class="card-title w-85 fs-4 fw-bold">{{$eachInbound->title}}</p>
                                <hr class="p-0 m-0">
                                <p class="card-title fs-4 text-muted my-2">{{$eachInbound->server->ip}}:{{$eachInbound->port}}</p>
                                <p class="text-muted">
                                    {{$eachInbound->description}}
                                </p>
                            </div>
                            <div class="card-footer collapse">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label required">{{__('app.general.start_date')}}</label>
                                        <div>
                                            <input type="text"
                                                   name="inbounds[{{$eachInbound->id}}][start_date]"
                                                   class="form-control datepicker"
                                                   value="{{$eachInbound->subscription_data?->start_date}}"
                                                   placeholder="{{__('app.general.start_date')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label required">{{__('app.general.end_date')}}</label>
                                        <div>
                                            <input type="text"
                                                   name="inbounds[{{$eachInbound->id}}][end_date]"
                                                   value="{{$eachInbound->subscription_data?->end_date}}"
                                                   class="form-control datepicker"
                                                   placeholder="{{__('app.general.end_date')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label required">{{__('app.general.subscription_price')}}</label>
                                        <div>
                                            <input type="text"
                                                   name="inbounds[{{$eachInbound->id}}][subscription_price]"
                                                   value="{{number_format($eachInbound->subscription_data?->subscription_price)}}"
                                                   class="form-control number_format"
                                                   placeholder="{{__('app.general.subscription_price')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">{{__('app.general.description')}}</label>
                                        <div>
                                            <textarea name="inbounds[{{$eachInbound->id}}][description]"
                                                      rows="3"
                                                      class="form-control resize-none"
                                                      placeholder="{{__('app.general.description')}}">{{$eachInbound->subscription_data?->description}}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer text-end">
            <div class="d-flex">
                <x-buttons.cancel/>
                <x-buttons.submit/>
            </div>
        </div>

    </form>

    <x-scripts.copy/>
    <x-scripts.search/>
    <x-libs.pwt-datepicker/>


    @push('scripts')

        <script>
            $(document).on( 'keyup', '#pageSearch', function(){

                let searchedValue = $(this).val().toString().trim().toLowerCase();
                $('.inbound-card-parent').addClass('d-none');
                $('.inbound-card-parent').each(function() {
                    let found = false;
                    let parentElement = $(this);
                    $(this).find('.card-body p').each(function(){
                        if ($(this).text().toString().trim().toLowerCase().includes( searchedValue ))
                            found = true;
                    });

                    if ( found )
                        parentElement.removeClass('d-none');
                });
            });

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
        </style>
    @endpush

@endsection
